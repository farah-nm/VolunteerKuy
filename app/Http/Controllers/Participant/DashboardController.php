<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VolunteerActivity;

class DashboardController extends Controller
{
    public function index()
    {

        $events = VolunteerActivity::where('status', 'aktif')
                    ->whereDate('registration_deadline', '>=', now())
                    ->orderBy('start_date', 'asc')
                    ->take(10)
                    ->get();

        return view('participant.dashboard', compact('events'));
    }
}
