<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware('auth');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Google, Facebook, Github, Twitter, GitLab, LinkedIn
Route::get('/auth/{provider}', [App\Http\Controllers\Auth\ProviderController::class, 'redirect'])->name('provider.redirect');
Route::get('/auth/{provider}/callback', [App\Http\Controllers\Auth\ProviderController::class, 'callback']);
