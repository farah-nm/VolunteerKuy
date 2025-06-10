<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DonationController extends Controller
{
    public function index(): View
    {
        $organizationId = auth()->user()->organizationProfile->id;
        $donations = Donation::whereHas('volunteerActivity', function ($query) use ($organizationId) {
            $query->where('organization_profile_id', $organizationId);
        })->with('participantProfile', 'volunteerActivity')
            ->latest()
            ->paginate(10);
        return view('organization.donations.index', compact('donations'));
    }

    public function createReport(): View
    {
        return view('organization.donations.report');
    }

    public function storeReport(Request $request): RedirectResponse
    {
        // Implementasikan logika penyimpanan laporan donasi di sini
        // Misalnya, Anda bisa membuat model atau tabel terpisah untuk laporan dana donasi
        // Sementara ini, kita akan redirect kembali dengan pesan sukses
        return redirect()->route('organization.donations.index')->with('success', 'Laporan dana donasi berhasil ditambahkan.');
    }
}
