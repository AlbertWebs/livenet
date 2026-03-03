<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Auth\LoginController;
use App\Models\ContactMessage;
use App\Models\ConnectionApplication;
use App\Models\CoverageArea;
use App\Models\SiteSetting;
use App\Mail\ConnectionApplicationNotification;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\InternetPlanController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\CoverageController;
use App\Http\Controllers\Admin\ConnectionApplicationController;
use App\Http\Controllers\HomeController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('settings', [SiteSettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SiteSettingController::class, 'update'])->name('settings.update');
    Route::get('coverage', [CoverageController::class, 'index'])->name('coverage.index');
    Route::post('coverage', [CoverageController::class, 'update'])->name('coverage.update');
    Route::get('coverage/geocode', [CoverageController::class, 'geocode'])->name('coverage.geocode');
    Route::get('application-requests', [ConnectionApplicationController::class, 'index'])->name('application-requests.index');
    Route::resource('pages', PageController::class);
    Route::resource('home-sections', HomeSectionController::class)->except(['show', 'destroy']);
    Route::resource('internet-plans', InternetPlanController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::get('media', [MediaController::class, 'index'])->name('media.index');
    Route::post('media', [MediaController::class, 'store'])->name('media.store');
    Route::delete('media/{medium}', [MediaController::class, 'destroy'])->name('media.destroy');
});

Route::get('/coverage-zones.json', function () {
    if (! Schema::hasTable('coverage_areas')) {
        return response()->json(config('coverage.default_zones', []));
    }
    $areas = CoverageArea::orderBy('sort_order')->get();
    if ($areas->isEmpty()) {
        return response()->json(config('coverage.default_zones', []));
    }
    $zones = $areas->map(fn ($a) => ['name' => $a->name, 'coords' => $a->coords ?? []])->values()->toArray();
    return response()->json($zones);
})->name('coverage.zones');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/home-internet', 'home-internet')->name('home-internet');
Route::view('/business-internet', 'business-internet')->name('business-internet');
Route::view('/our-coverage', 'our-coverage')->name('our-coverage');
Route::view('/articles', 'articles')->name('articles');
Route::view('/about', 'about')->name('about');
Route::get('/contact', fn () => view('contact'))->name('contact');
Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'nullable|string|max:50',
        'message' => 'required|string|max:5000',
    ]);
    ContactMessage::create($validated);
    return redirect()->route('contact')->with('success', 'Thank you! Your message has been sent. We will get back to you within one business day.');
})->name('contact.store');

Route::post('/apply-connection', function (Request $request) {
    // Honeypot: if filled, pretend success (no save, no email)
    if ($request->filled('website')) {
        return response()->json(['success' => true, 'message' => 'Thank you! Your application has been submitted. We will contact you shortly.']);
    }
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'nullable|string|max:50',
        'service' => 'nullable|string|in:home,business',
        'message' => 'nullable|string|max:2000',
        'challenge_num1' => 'required|integer|min:1|max:20',
        'challenge_num2' => 'required|integer|min:1|max:20',
        'challenge_answer' => 'required|integer',
    ]);
    $expected = (int) $validated['challenge_num1'] + (int) $validated['challenge_num2'];
    if ((int) $request->challenge_answer !== $expected) {
        return response()->json(['message' => 'Invalid security check. Please solve the arithmetic question correctly.'], 422);
    }
    ConnectionApplication::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'] ?? null,
        'service' => $validated['service'] ?? null,
        'message' => $validated['message'] ?? null,
    ]);
    $toEmail = SiteSetting::get('contact_email') ?: config('mail.from.address');
    if ($toEmail) {
        try {
            Mail::to($toEmail)
                ->cc('albertmuhatia@gmail.com')
                ->send(new ConnectionApplicationNotification(
                    $validated['name'],
                    $validated['email'],
                    $validated['phone'] ?? null,
                    $validated['service'] ?? null,
                    $validated['message'] ?? null
                ));
        } catch (\Throwable $e) {
            report($e);
        }
    }
    return response()->json(['success' => true, 'message' => 'Thank you! Your application has been submitted. We will contact you shortly.']);
})->name('apply-connection.store');
