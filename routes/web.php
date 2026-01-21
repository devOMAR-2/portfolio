<?php

use App\Models\Message;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/messages/{message}/print', function (Message $message) {
    return view('messages.print', compact('message'));
})->middleware(['auth'])->name('messages.print');
