<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
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
            // Tambahkan validasi untuk field profil partisipan lainnya
        ]);

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update data profil partisipan jika ada field tambahan
        if (auth()->user()->participantProfile) {
            auth()->user()->participantProfile->update($request->except(['_token', '_method', 'name', 'email']));
        }

        return redirect()->route('participant.dashboard')->with('success', 'Profil berhasil diupdate.');
    }
}
