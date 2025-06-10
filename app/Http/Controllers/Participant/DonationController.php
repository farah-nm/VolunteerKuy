<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DonationController extends Controller
{
    public function create(): View
    {
        // Anda mungkin ingin menampilkan daftar organisasi atau event untuk didonasi
        return view('participant.donations.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'organization_profile_id' => 'nullable|exists:organization_profiles,id', // Atau event_id
            'amount' => 'required|numeric|min:1000', // Contoh validasi jumlah donasi
            'payment_method' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:500',
        ]);

        Donation::create([
            'participant_profile_id' => auth()->user()->participantProfile->id,
            'organization_profile_id' => $request->organization_profile_id, // Atau event_id
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'notes' => $request->notes,
            'donation_date' => now(),
        ]);

        return redirect()->route('participant.donations.index')->with('success', 'Donasi Anda telah diterima. Terima kasih!');
    }

    public function index(): View
    {
        $donations = Donation::where('participant_profile_id', auth()->user()->participantProfile->id)
            ->latest()
            ->paginate(10);
        return view('participant.donations.index', compact('donations'));
    }
}
