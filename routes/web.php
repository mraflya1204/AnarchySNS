<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SNSController;

Route::get('/', [SNSController::class, 'index'])->name('sns.index');
Route::get('/create', [SNSController::class, 'create'])->name('sns.create');
Route::post('/', [SNSController::class, 'store'])->name('sns.store');
Route::get('/list', [SNSController::class, 'list'])->name('sns.list');
Route::get('/about', [SNSController::class, 'about'])->name('sns.about');
Route::get('/{sns}', [SNSController::class, 'show'])->name('sns.show');
Route::delete('/{sns}', [SNSController::class, 'destroy'])->name('sns.destroy');