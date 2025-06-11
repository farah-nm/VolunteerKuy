<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController; // Ganti LoginController dengan ini
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Organization\AuthController as OrganizationAuthController; // Tambahkan baris ini
use App\Http\Controllers\Organization\DashboardController as OrganizationDashboardController;
use App\Http\Controllers\Organization\DonationController as OrganizationDonationController;
use App\Http\Controllers\Organization\EventController as OrganizationEventController;
use App\Http\Controllers\Organization\ProfileController as OrganizationProfileController;
use App\Http\Controllers\Organization\VolunteerController as OrganizationVolunteerController;
use App\Http\Controllers\Participant\ProfileController as ParticipantProfileController;
use App\Http\Controllers\Participant\EventController as ParticipantEventController;
use App\Http\Controllers\Participant\AuthController as ParticipantAuthController;
use App\Http\Controllers\Participant\DashboardController as ParticipantDashboardController;
use App\Http\Controllers\Participant\VolunteerRegistrationController as ParticipantVolunteerRegistrationController;
use App\Http\Controllers\Participant\DonationController as ParticipantDonationController;
use App\Http\Controllers\Participant\ReportController as ParticipantReportController;
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
})->name('welcome');

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
    Route::resource('reports', AdminReportController::class)->only(['index', 'edit', 'update']);
    Route::resource('accounts', AdminAccountController::class)
    ->parameter('accounts', 'user')
    ->only(['index', 'edit', 'update']);
});

Route::middleware(['auth', 'role:organization'])->prefix('organization')->name('organization.')->group(function () {
    Route::get('/dashboard', [OrganizationDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile/edit', [OrganizationProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [OrganizationProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [OrganizationProfileController::class, 'show'])->name('profile');
    Route::resource('events', OrganizationEventController::class);
    Route::get('/volunteers', [OrganizationVolunteerController::class, 'index'])->name('volunteers.index');
    Route::resource('donations', OrganizationDonationController::class)->only(['index', 'create', 'store']); // Assuming create for report
    Route::get('/donations/report', [OrganizationDonationController::class, 'createReport'])->name('donations.report.create');
    Route::post('/donations/report', [OrganizationDonationController::class, 'storeReport'])->name('donations.report.store');
});

Route::middleware(['auth', 'role:participant'])->prefix('participant')->name('participant.')->group(function () {
    Route::get('/dashboard', [ParticipantDashboardController::class, 'index'])->name('dashboard');
    Route::get('/events', [ParticipantEventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [ParticipantEventController::class, 'show'])->name('events.show');
    Route::get('/profile/edit', [ParticipantProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ParticipantProfileController::class, 'update'])->name('profile.update');
    Route::get('/volunteer-registrations/create', [ParticipantVolunteerRegistrationController::class, 'create'])->name('volunteer-registrations.create');
    Route::post('/volunteer-registrations', [ParticipantVolunteerRegistrationController::class, 'store'])->name('volunteer-registrations.store');
    Route::get('/donations', [ParticipantDonationController::class, 'index'])->name('donations.index');
    Route::get('/donations/create', [ParticipantDonationController::class, 'create'])->name('donations.create');
    Route::post('/donations', [ParticipantDonationController::class, 'store'])->name('donations.store');
    Route::resource('reports', ParticipantReportController::class)->only(['index', 'create', 'store', 'show']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
