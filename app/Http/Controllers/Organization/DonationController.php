<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\VolunteerActivity;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    // Menampilkan donasi dari aktivitas volunteer tertentu
    public function showActivityDonations($id)
    {
        $organization = auth()->user()->organizationProfile;

        $volunteerActivity = $organization->volunteerActivities()->findOrFail($id);

        $donations = $volunteerActivity->donations()->with('user')->latest()->get();

        return view('organization.donations.show', compact('volunteerActivity', 'donations'));
    }
}
