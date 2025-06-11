<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Donation; // Asumsi Anda memiliki model Donation
use Illuminate\View\View;

class DonationController extends Controller
{
    public function index(): View
    {
        $organizationId = auth()->user()->organizationProfile->id;


        $donations = Donation::whereHas('event', function ($query) use ($organizationId) {
            $query->where('organization_profile_id', $organizationId);
        })
            ->orWhere('organization_profile_id', $organizationId) // Atau cara lain organisasi menerima donasi
            ->latest()
            ->paginate(10);

        return view('organization.donations.index', compact('donations'));
    }


}
