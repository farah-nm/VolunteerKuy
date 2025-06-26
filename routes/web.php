<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Organization\AuthController as OrganizationAuthController;
use App\Http\Controllers\Organization\DashboardController as OrganizationDashboardController;
use App\Http\Controllers\Organization\VolunteerController;
use App\Http\Controllers\Organization\DonationController as OrganizationDonationController;
use App\Http\Controllers\Organization\OrganizationProfileController;
use App\Http\Controllers\Participant\ProfileController as ParticipantProfileController;
use App\Http\Controllers\Participant\EventController as ParticipantEventController;
use App\Http\Controllers\Participant\AuthController as ParticipantAuthController;
use App\Http\Controllers\Participant\DashboardController as ParticipantDashboardController;
use App\Http\Controllers\Participant\VolunteerRegistrationController as ParticipantVolunteerRegistrationController;
use App\Http\Controllers\Participant\DonationController as ParticipantDonationController;
use App\Http\Controllers\Participant\ReportController as ParticipantReportController;
use App\Http\Controllers\Participant\OrganizationController as ParticipantOrganizationController;
use App\Http\Controllers\ProfileController as GlobalProfileController;

/* --------------------------------------------------------------------------
| Public / General Routes
|-------------------------------------------------------------------------- */
Route::get('/', fn () => view('welcome'))->name('welcome');
Route::get('/login',  [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register/organization', [OrganizationAuthController::class, 'showRegistrationForm'])->name('register.organization');
Route::post('/register/organization', [OrganizationAuthController::class, 'register']);
Route::get('/register/participant',  [ParticipantAuthController::class,  'showRegistrationForm'])->name('register.participant');
Route::post('/register/participant', [ParticipantAuthController::class,  'register']);

/* --------------------------------------------------------------------------
| Dashboard Redirect
|-------------------------------------------------------------------------- */
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return match (auth()->user()->role) {
        'admin'        => redirect()->route('admin.dashboard'),
        'organization' => redirect()->route('organization.dashboard'),
        'participant'  => redirect()->route('participant.dashboard'),
        default        => view('dashboard'),
    };
})->name('dashboard');

/* --------------------------------------------------------------------------
| Admin Routes
|-------------------------------------------------------------------------- */
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('reports',  AdminReportController::class)->only(['index', 'edit', 'update']);
    Route::resource('accounts', AdminAccountController::class)
        ->parameter('accounts', 'user')->only(['index', 'edit', 'update']);
});

/* --------------------------------------------------------------------------
| Organization Routes
|-------------------------------------------------------------------------- */
Route::middleware(['auth'])->prefix('organization')->name('organization.')->group(function () {
    Route::get('/dashboard', [OrganizationDashboardController::class, 'index'])->name('dashboard');
    Route::get('events/{event}/volunteers',             [VolunteerController::class, 'volunteers'])->name('volunteers.index');
    Route::get('events/{event}/volunteers/{volunteer}', [VolunteerController::class, 'volunteerDetail'])->name('volunteers.show');
    Route::get('events/{id}/donations', [OrganizationDonationController::class, 'showActivityDonations'])->name('events.donations.show');
    Route::resource('events', VolunteerController::class);
    Route::get('/profile',        [OrganizationProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/create', [OrganizationProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile',       [OrganizationProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/edit',   [OrganizationProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile',        [OrganizationProfileController::class, 'update'])->name('profile.update');
});

/* --------------------------------------------------------------------------
| Participant Routes
|-------------------------------------------------------------------------- */
Route::middleware(['auth'])->prefix('participant')->name('participant.')->group(function () {
    Route::get('/dashboard', [ParticipantDashboardController::class, 'index'])->name('dashboard');
    Route::get('/events',          [ParticipantEventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}',  [ParticipantEventController::class, 'show'])->name('events.show');
    Route::get('/volunteer-registrations/create/{event}', [ParticipantVolunteerRegistrationController::class, 'create'])->name('volunteer-registrations.create');
    Route::post('/volunteer-registrations',               [ParticipantVolunteerRegistrationController::class, 'store'])->name('volunteer-registrations.store');
    Route::get('/organizations/search',[ParticipantOrganizationController::class, 'index'])->name('organizations.search');
    Route::get('/organizations/{organizationProfile}', [OrganizationProfileController::class, 'showPublicProfile'])->name('organizations.show');
    Route::get('/organizations/{organizationProfile}/report',  [ParticipantReportController::class, 'createOrganizationReport'])->name('organizations.report.create');
    Route::post('/organizations/{organization}/report', [ParticipantReportController::class, 'storeOrganizationReport'])->name('organizations.report.store');
    Route::get('/profile',      [ParticipantProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit',[ParticipantProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile',[ParticipantProfileController::class, 'update'])->name('profile.update');
    Route::get('/donations',[ParticipantDonationController::class, 'index'])->name('donations.index');
    Route::get('/donations/create/{event?}', [ParticipantDonationController::class, 'create'])->name('donations.create');
    Route::post('/donations',       [ParticipantDonationController::class, 'store'])->name('donations.store');
    Route::resource('reports', ParticipantReportController::class)->only(['index', 'create', 'store', 'show']);
});

/* --------------------------------------------------------------------------
| Global Authenticated User Profile Routes
|-------------------------------------------------------------------------- */
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [GlobalProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',    [GlobalProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',   [GlobalProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
