<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\VolunteerActivity;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class VolunteerRegistrationController extends Controller
{

    public function create(VolunteerActivity $event): View
    {
        return view('participant.volunteer_registrations.create', compact('event'));
    }

    // Menyimpan pendaftaran
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'event_id'   => 'required|exists:volunteer_activities,id',
            'motivation' => 'nullable|string|max:500',
        ]);

        Application::create([
            'volunteer_activity_id'   => $request->event_id,
            'participant_profile_id'  => auth()->user()->participantProfile->id,

        ]);

        VolunteerActivity::find($request->event_id)->decrement('slots_available');

        return redirect()->route('participant.dashboard')->with('success', 'Pendaftaran relawan berhasil dikirim!');
    }
}
