<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\EventRegistrationExportController;


Route::get('/profile', [MemberController::class, 'index'])->name('profile.index');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event-registrations/export/{eventId}', [EventRegistrationExportController::class, 'export'])
    ->whereNumber('eventId')->name('event-registrations.export');
Route::get('/events', [HomeController::class, 'eventsIndex'])->name('events.index');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
// Event routes
Route::prefix('event')->group(function() {
    Route::get('/', [EventController::class, 'index']);
    Route::get('/{id}', [EventController::class, 'show'])
        ->whereNumber('id')->name('event.show');
    Route::get('/{id}/register', [\App\Http\Controllers\EventRegistrationController::class, 'create'])
        ->whereNumber('id')->name('event.register');
    Route::post('/{id}/register', [\App\Http\Controllers\EventRegistrationController::class, 'store'])
        ->whereNumber('id')->name('event.register.store');
});
// Contact form route
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');