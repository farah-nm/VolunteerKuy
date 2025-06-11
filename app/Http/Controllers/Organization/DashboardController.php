<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $organizationProfile = Auth::user()->organizationProfile;

        $events = $organizationProfile->events()->latest()->take(6)->get();

        return view('organization.dashboard', compact('organizationProfile', 'events'));
    }
}
