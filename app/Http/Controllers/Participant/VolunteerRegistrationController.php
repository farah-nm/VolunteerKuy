<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Application; // Ganti dengan model yang sesuai (Application)
use App\Models\VolunteerActivity;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class VolunteerRegistrationController extends Controller
{
    public function create(Request $request, VolunteerActivity $event = null): View
    {
        if (!$event && $request->has('event')) {
            $event = VolunteerActivity::findOrFail($request->event);
        }
        return view('participant.volunteer-registrations.create', compact('event'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'event_id' => 'required|exists:volunteer_activities,id',
            'motivation' => 'nullable|string|max:500', // Contoh field tambahan
        ]);

        Application::create([ // Ganti dengan model yang sesuai (Application)
            'volunteer_activity_id' => $request->event_id,
            'participant_profile_id' => auth()->user()->participantProfile->id,
            'status' => 'pending', // Atau status default lainnya
            'motivation' => $request->motivation,
        ]);

        return redirect()->route('participant.dashboard')->with('success', 'Pendaftaran relawan berhasil dikirim!');
    }
}
