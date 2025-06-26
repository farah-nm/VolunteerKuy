<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\VolunteerActivity;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {

        $events = VolunteerActivity::with('organizationProfile')
            ->where('status', 'aktif')
            ->latest()
            ->paginate(10);

        return view('participant.events.index', compact('events'));
    }

    public function show(VolunteerActivity $event): View
    {

        $event->load('organizationProfile');

        return view('participant.events.show', compact('event'));
    }
}
