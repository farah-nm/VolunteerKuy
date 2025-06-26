<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\OrganizationProfile;
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

        ]);

        Report::create([
            'participant_profile_id' => auth()->user()->participantProfile->id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'success',
            'submitted_at' => now(),

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

    public function createOrganizationReport(OrganizationProfile $organizationProfile): View
    {
    return view('participant.reports.create', ['organization' => $organizationProfile]);
    }


public function storeOrganizationReport(Request $request, OrganizationProfile $organization): RedirectResponse
{
    $request->validate([
        'title' => 'required|string|max:255',
        'reason' => 'required|string',
        'supporting_evidence' => 'nullable|file|mimes:jpg,pdf|max:2048', // Validasi untuk file
    ]);

    $reportData = [
        'participant_profile_id' => auth()->user()->participantProfile->id,
        'organization_profile_id' => $organization->id,
        'title' => $request->title,
        'description' => $request->reason,
        'status' => 'processed',
        'submitted_at' => now(),
    ];

    // Simpan file jika ada
    if ($request->hasFile('supporting_evidence')) {
        $path = $request->file('supporting_evidence')->store('public/report_evidence'); // Simpan di folder storage/app/public/report_evidence
        $reportData['supporting_evidence_path'] = \Illuminate\Support\Facades\Storage::url($path); // Simpan path file di database
    } else {
        $reportData['supporting_evidence'] = $request->input('supporting_evidence'); // Jika tidak ada file, simpan teks (jika ada)
    }

    Report::create($reportData);

    return redirect()->route('participant.organizations.show', $organization->id)->with('success', 'Laporan organisasi berhasil dikirim dan akan kami tindak lanjuti.');
}
}
