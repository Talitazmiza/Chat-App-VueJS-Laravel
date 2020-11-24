<?php

use Illuminate\Support\Facades\Route;



Route::get('/coba', function () {
    return view('layouts.vue');
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/getFriends', [App\Http\Controllers\HomeController::class, 'getFriends']);
Route::post('/session/create', 'App\Http\Controllers\SessionController@create');
