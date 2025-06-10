<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\VolunteerActivity;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = VolunteerActivity::where('status', 'published')->latest()->paginate(10);
        return view('participant.events.index', compact('events'));
    }

    public function show(VolunteerActivity $event): View
    {
        return view('participant.events.show', compact('event'));
    }
}
