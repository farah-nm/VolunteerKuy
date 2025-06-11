<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Organization\UpdateOrganizationProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\OrganizationProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(): View
    {
        $organizationProfile = auth()->user()->organizationProfile;
        return view('organization.profile.edit', compact('organizationProfile'));
    }

    public function update(UpdateOrganizationProfileRequest $request): RedirectResponse
    {
        $organizationProfile = auth()->user()->organizationProfile;
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            if ($organizationProfile->logo_path) {
                Storage::delete(str_replace('/storage', 'public', $organizationProfile->logo_path));
            }
            $path = $request->file('logo')->store('public/organization_logos');
            $data['logo_path'] = Storage::url($path);
        }

        $organizationProfile->update($data);

        return redirect()->route('organization.dashboard')->with('success', 'Profil organisasi berhasil diupdate.');
    }

    public function create()
    {
        return view('organization.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // field lain validasi di sini
        ]);

        $profile = OrganizationProfile::create([
            'user_id' => auth()->id(),
            'name' => $request->name,

        ]);

        return redirect()->route('organization.profile.edit', $profile->id)->with('success', 'Profil berhasil dibuat.');
    }
}
