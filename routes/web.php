<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::view('/', 'home')->name('home');
Route::view('/home-internet', 'home-internet')->name('home-internet');
Route::view('/business-internet', 'business-internet')->name('business-internet');
Route::view('/articles', 'articles')->name('articles');
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
