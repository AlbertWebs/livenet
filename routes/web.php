<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\InternetPlanController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\MediaController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('settings', [SiteSettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SiteSettingController::class, 'update'])->name('settings.update');
    Route::resource('pages', PageController::class);
    Route::resource('home-sections', HomeSectionController::class)->except(['show', 'destroy']);
    Route::resource('internet-plans', InternetPlanController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::get('media', [MediaController::class, 'index'])->name('media.index');
    Route::post('media', [MediaController::class, 'store'])->name('media.store');
    Route::delete('media/{medium}', [MediaController::class, 'destroy'])->name('media.destroy');
});

Route::view('/', 'home')->name('home');
Route::view('/home-internet', 'home-internet')->name('home-internet');
Route::view('/business-internet', 'business-internet')->name('business-internet');
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
    // TODO: Send email or store in DB using $validated
    return redirect()->route('contact')->with('success', 'Thank you! Your message has been sent. We will get back to you within one business day.');
})->name('contact.store');

Route::post('/apply-connection', function (Request $request) {
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
    // TODO: Send email or store application using $validated
    return response()->json(['success' => true, 'message' => 'Thank you! Your application has been submitted. We will contact you shortly.']);
})->name('apply-connection.store');
