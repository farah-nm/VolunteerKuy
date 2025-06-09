<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController; // Ganti LoginController dengan ini
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Organization\AuthController as OrganizationAuthController; // Tambahkan baris ini
use App\Http\Controllers\Organization\DashboardController as OrganizationDashboardController;
use App\Http\Controllers\Participant\AuthController as ParticipantAuthController; // Tambahkan baris ini
use App\Http\Controllers\Participant\DashboardController as ParticipantDashboardController;
use App\Http\Controllers\ProfileController; // Pastikan ini ada jika Anda menggunakannya
use App\Http\Middleware\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login'); // Ubah showLoginForm menjadi create
Route::post('/login', [AuthenticatedSessionController::class, 'store']); // Ubah login menjadi store

// Rute registrasi (tetap terpisah untuk saat ini)
Route::get('/register/organization', [OrganizationAuthController::class, 'showRegistrationForm'])->name('register.organization');
Route::post('/register/organization', [OrganizationAuthController::class, 'register']);
Route::get('/register/participant', [ParticipantAuthController::class, 'showRegistrationForm'])->name('register.participant');
Route::post('/register/participant', [ParticipantAuthController::class, 'register']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    // ... route admin lainnya
});

Route::middleware(['auth', 'role:organization'])->prefix('organization')->name('organization.')->group(function () {
    Route::get('/dashboard', [OrganizationDashboardController::class, 'index'])->name('dashboard');
    // ... route organisasi lainnya
});

Route::middleware(['auth', 'role:participant'])->prefix('participant')->name('participant.')->group(function () {
    Route::get('/dashboard', [ParticipantDashboardController::class, 'index'])->name('dashboard');
    // ... route partisipan lainnya
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
