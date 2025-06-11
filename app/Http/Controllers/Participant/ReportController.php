<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ReportController extends Controller
{
    public function index(): View
    {
        $reports = Report::where('participant_profile_id', auth()->user()->participantProfile->id)
            ->latest()
            ->paginate(10);
        return view('participant.reports.index', compact('reports'));
    }

    public function create(): View
    {
        return view('participant.reports.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Tambahkan validasi untuk field laporan lainnya
        ]);

        Report::create([
            'participant_profile_id' => auth()->user()->participantProfile->id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'submitted', // Atau status default lainnya
            'submitted_at' => now(),
            // Simpan field laporan lainnya
        ]);

        return redirect()->route('participant.reports.index')->with('success', 'Laporan berhasil dikirim!');
    }

    public function show(Report $report): View
    {
        if ($report->participant_profile_id !== auth()->user()->participantProfile->id) {
            abort(403);
        }
        return view('participant.reports.show', compact('report'));
    }
}
