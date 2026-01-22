<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/admin/messages/{message}/print', function (Message $message) {
    return view('messages.print', compact('message'));
})->middleware(['auth'])->name('messages.print');
