<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show(): View
    {
        $participantProfile = auth()->user()->participantProfile;
        $volunteerRegistrations = $participantProfile->applications()->with('volunteerActivity')->latest()->get();
        $donations = $participantProfile->donations()->latest()->get();
        $reports = $participantProfile->reports()->latest()->get();

        return view('participant.profile.show', compact('participantProfile', 'volunteerRegistrations', 'donations', 'reports'));
    }

    public function edit(): View
    {
        $participantProfile = auth()->user()->participantProfile;
        return view('participant.profile.edit', compact('participantProfile'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'profile_picture_path' => 'nullable|image|max:2048',
        ]);

        $user = User::findOrFail(auth()->id());
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $profile = $user->participantProfile ?? $user->participantProfile()->create([
            'full_name' => $request->full_name
        ]);

        $data = $request->only([
            'full_name', 'date_of_birth', 'gender', 'phone_number',
            'address', 'city', 'province'
        ]);

        if ($request->hasFile('profile_picture_path')) {
            $data['profile_picture_path'] = $request->file('profile_picture_path')
                ->store('profile_pictures', 'public');
        }

        $profile->update($data);

        return redirect()->route('participant.dashboard')->with('success', 'Profil berhasil diperbarui.');
    }
}
