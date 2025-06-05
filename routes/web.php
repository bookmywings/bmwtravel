<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//BMW App Specific Routes
Route::get('/about-us', [CMSController::class, 'show'])->name('cms.about');
Route::get('/contact', [ContactController::class, 'form'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit']);