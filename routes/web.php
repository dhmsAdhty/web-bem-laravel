<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\EventRegistrationExportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EventDashboardController;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\EventRegistrationDashboardController;

// =======================
// PUBLIC ROUTES
// =======================
Route::get('/', [HomeController::class, 'index'])->name('home');

// 👥 Profile untuk user umum
Route::get('/profile', [MemberController::class, 'index'])->name('profile.index');

// 📅 Events (public)
Route::get('/events', [HomeController::class, 'eventsIndex'])->name('events.index');
Route::prefix('event')->group(function () {
    Route::get('/', [EventController::class, 'index']);
    Route::get('/{id}', [EventController::class, 'show'])
        ->whereNumber('id')->name('event.show');
    Route::get('/{id}/register', [EventRegistrationController::class, 'create'])
        ->whereNumber('id')->name('event.register');
    Route::post('/{id}/register', [EventRegistrationController::class, 'store'])
        ->whereNumber('id')->name('event.register.store');
});

// 📄 Export Registrations (PDF)
Route::get('/event-registrations/export/{eventId}', [EventRegistrationExportController::class, 'export'])
    ->whereNumber('eventId')->name('event-registrations.export');

// 📰 Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// 📩 Contact form
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

// 🔐 Login / Logout admin
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// =======================
// DASHBOARD (AUTH REQUIRED)
// =======================
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    // 🏠 Dashboard Home
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // 👥 Anggota (CRUD)
    Route::resource('anggota', AnggotaController::class);

    // 📰 Berita (CRUD)
    Route::resource('berita', BeritaController::class);

    // 📅 Events (CRUD)
    Route::resource('events', EventDashboardController::class);

    // 📝 Event Registrations (CRUD Dashboard)
    Route::resource('registrations', EventRegistrationDashboardController::class)
        ->only(['index', 'create', 'store', 'show', 'destroy']);
});
