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
        // Eager load relationship jika Auth::user() tidak null
        return view('organization.dashboard', compact('organizationProfile'));
    }
}
