<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ReportController extends Controller
{
    public function index(): View
    {
        $reports = Report::with('participantProfile')->latest()->paginate(10); // Eager load participant profile and paginate
        return view('admin.reports.index', compact('reports'));
    }

    public function edit(Report $report): View
    {
        return view('admin.reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:pending,processed,resolved,rejected',
        ]);

        $report->update(['status' => $request->status]);

        return redirect()->route('admin.reports.index')->with('success', 'Status laporan berhasil diubah.');
    }

}
