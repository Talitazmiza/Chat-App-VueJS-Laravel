<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Auth;

Route::get('/coba', function () {
    return view('layouts.vue');
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');   
Route::get('/getFriends', [App\Http\Controllers\HomeController::class, 'getFriends']);
Route::post('/session/create', [SessionController::class, 'create']);
Route::post('/send/{session}', [ChatController::class, 'send']);
