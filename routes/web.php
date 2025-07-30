<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventRegistrationExportController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/event-registrations/export/{eventId}', [EventRegistrationExportController::class, 'export'])->name('event-registrations.export');

Route::get('/events', [HomeController::class, 'eventsIndex'])->name('events.index');


Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Event detail route
Route::get('/event/{id}', function($id) {
    $event = \App\Models\Event::findOrFail($id);
    return view('event.show', compact('event'));
})->name('event.show');

// Event route menu
Route::get('/event', function() {
    $events = \App\Models\Event::orderByDesc('start_date')->get();
    return view('event.show', compact('events'));
})->name('events.index');

// Event registration route
Route::get('/event/{id}/register', [\App\Http\Controllers\EventRegistrationController::class, 'create'])->name('event.register');
Route::post('/event/{id}/register', [\App\Http\Controllers\EventRegistrationController::class, 'store'])->name('event.register.store');