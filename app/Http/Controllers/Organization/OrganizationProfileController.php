<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\OrganizationProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class OrganizationProfileController extends Controller
{

    public function show(): View
    {
        $organization = auth()->user()->organizationProfile;

        $organization->load('volunteerActivities.applications.participantProfile.user');

        $volunteers = $organization->volunteerActivities
            ->flatMap(fn ($activity) => optional($activity->applications)->pluck('participantProfile.user'))
            ->filter()
            ->unique('id')
            ->values();

        return view('organization.profile.show', compact('organization', 'volunteers'));
    }

    public function showPublicProfile(OrganizationProfile $organizationProfile): View
    {
        $organizationProfile->load('volunteerActivities.applications.participantProfile.user');

        $participants = $organizationProfile->volunteerActivities
            ->flatMap(fn ($activity) => optional($activity->applications)->pluck('participantProfile.user'))
            ->filter()
            ->unique('id')
            ->values();

        return view('participant.organizations.public_profile', compact('organizationProfile', 'participants'));
    }

    // EDIT PROFIL
    public function edit(): View
    {
        $organizationProfile = auth()->user()->organizationProfile;
        return view('organization.profile.edit', compact('organizationProfile'));
    }

    public function update(Request $request): RedirectResponse
    {
        $organizationProfile = auth()->user()->organizationProfile;

        $data = $request->validate([
            'name' => 'required|string|max:255|unique:organization_profiles,name,' . $organizationProfile->id,
            'description' => 'nullable|string',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'phone_number' => 'nullable|string|max:20',
            'website_url' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($organizationProfile->logo_path) {
                Storage::delete(str_replace('/storage', 'public', $organizationProfile->logo_path));
            }

            $path = $request->file('logo')->store('public/organization_logos');
            $data['logo_path'] = Storage::url($path);
        }

        $organizationProfile->update($data);

        return redirect()
            ->route('organization.profile.edit')
            ->with('success', 'Profil organisasi berhasil diperbarui.');
    }

    public function create(): View
    {
        return view('organization.profile.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $profile = OrganizationProfile::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
        ]);

        return redirect()
            ->route('organization.profile.edit', $profile->id)
            ->with('success', 'Profil berhasil dibuat.');
    }
}
