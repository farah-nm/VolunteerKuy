<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\OrganizationProfile;
use App\Models\VolunteerActivity;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DonationController extends Controller
{
    public function create(VolunteerActivity $event): View
    {
        return view('participant.donations.create', compact('event'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            // aslinya yang ini
            // 'organization_profile_id' => 'nullable|exists:organization_profiles,id', // Atau event_id
            // 'amount' => 'required|numeric|min:1000', // Contoh validasi jumlah donasi
            // 'payment_method' => 'nullable|string|max:255',
            // 'notes' => 'nullable|string|max:500',
            // ditambahin el
            'volunteer_activity_id' => 'required|exists:volunteer_activities,id',
            'amount' => 'required|numeric|min:10000',
            'payment_method' => 'required|string|max:255',
            'notes' => 'nullable|string|max:500',
            'proof' => 'required|image|max:3048', // max 2MB dan harus gambar
        ]);


        $event = VolunteerActivity::findOrFail($request->volunteer_activity_id);

        // Simpan bukti pembayaran
        $path = $request->file('proof')->store('donation_proofs', 'public');

        Donation::create([
            'participant_profile_id' => auth()->user()->participantProfile->id,
            'volunteer_activity_id' => $event->id, // ditambahin el
            'organization_profile_id' => $request->organization_profile_id, // Atau event_id
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'notes' => $request->notes,
            'proof_path' => Storage::url($path),
            'status' => 'pending',
            // 'donation_date' => now(),
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
