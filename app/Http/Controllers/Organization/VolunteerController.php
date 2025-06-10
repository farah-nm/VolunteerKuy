<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\View\View;

class VolunteerController extends Controller
{
    public function index(): View
    {
        $organizationId = auth()->user()->organizationProfile->id;
        $applications = Application::whereHas('volunteerActivity', function ($query) use ($organizationId) {
            $query->where('organization_profile_id', $organizationId);
        })->with(['participantProfile', 'volunteerActivity'])
            ->latest()
            ->paginate(10);

        return view('organization.volunteers.index', compact('applications'));
    }
}
