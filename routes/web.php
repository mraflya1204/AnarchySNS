<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SNSController;

Route::get('/', fn () => redirect()->route('sns.index'));

// about page
Route::get('/about', [SNSController::class, 'about'])->name('sns.about');

Route::resource('sns', SNSController::class)->only([
    'index', 'create', 'store', 'show', 'destroy'
]);