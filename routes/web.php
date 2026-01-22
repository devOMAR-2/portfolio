<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::get('/admin/messages/{message}/print', function (Message $message) {
    abort_unless(auth()->user()?->canAccessPanel(Filament\Facades\Filament::getPanel('admin')), 403);

    return view('messages.print', compact('message'));
})->middleware(['auth'])->name('messages.print');
