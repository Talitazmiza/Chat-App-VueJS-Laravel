<?php

use App\Http\Controllers\BlockController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Route::get('/coba', function () {
    return view('layouts.vue');
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/getFriends', [HomeController::class, 'getFriends']);
Route::post('/session/create', [SessionController::class, 'create']);
Route::post('/send/{session}', [ChatController::class, 'send']);
Route::post('/session/{session}/chats', [ChatController::class, 'chats']);
Route::post('/session/{session}/read', [ChatController::class, 'read']);
Route::post('/session/{session}/clear', [ChatController::class, 'clear']);
Route::post('/session/{session}/block', [BlockController::class, 'block']);
Route::post('/session/{session}/unblock', [BlockController::class, 'unblock']);