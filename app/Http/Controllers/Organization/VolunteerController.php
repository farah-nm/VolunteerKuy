<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\VolunteerActivity;
use App\Models\Volunteer;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VolunteerController extends Controller
{
    // 1. Daftar event
    public function index(): View
    {
        $organization = auth()->user()->organizationProfile;
        $events = $organization->volunteerActivities()->orderByDesc('created_at')->paginate(10);

        return view('organization.events.index', compact('events'));
    }

    // 2. Form buat event
    public function create(): View
    {
        return view('organization.events.create');
    }

    // 3. Simpan event baru
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'location_address' => 'required|string',
            'location_city' => 'required|string',
            'location_province' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'registration_deadline' => 'required|date|before_or_equal:start_date',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
            'slots_available' => 'nullable|integer|min:0',
            'banner_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('banner_image')) {
            $path = $request->file('banner_image')->store('banners', 'public');
            $validated['banner_image_path'] = '/storage/' . $path;
        }

        $organization = auth()->user()->organizationProfile;
        $organization->volunteerActivities()->create($validated);

        return redirect()->route('organization.events.index')->with('success', 'Aktivitas berhasil dibuat.');
    }

    // 4. Detail event
    public function show($id): View
    {
        $organization = auth()->user()->organizationProfile;
        $event = $organization->volunteerActivities()->findOrFail($id);

        return view('organization.events.show', compact('event'));
    }

    // 5. Edit event
    public function edit($id): View
    {
        $organization = auth()->user()->organizationProfile;
        $activity = $organization->volunteerActivities()->findOrFail($id);

        return view('organization.events.edit', ['event' => $activity]);
    }

    // 6. Update event
    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'location_address' => 'required|string',
            'location_city' => 'required|string',
            'location_province' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'registration_deadline' => 'required|date|before_or_equal:start_date',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
            'slots_available' => 'nullable|integer|min:0',
            'banner_image' => 'nullable|image|max:2048',
        ]);

        $organization = auth()->user()->organizationProfile;
        $activity = $organization->volunteerActivities()->findOrFail($id);

        if ($request->hasFile('banner_image')) {
            // Hapus gambar lama jika ada
            if ($activity->banner_image_path) {
                $oldPath = str_replace('/storage/', '', $activity->banner_image_path);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('banner_image')->store('banners', 'public');
            $validated['banner_image_path'] = '/storage/' . $path;
        }

        $activity->update($validated);

        return redirect()->route('organization.events.index')->with('success', 'Aktivitas berhasil diperbarui.');
    }

    // 7. Hapus event
    public function destroy($id): RedirectResponse
    {
        $organization = auth()->user()->organizationProfile;
        $activity = $organization->volunteerActivities()->findOrFail($id);

        // Hapus gambar jika ada
        if ($activity->banner_image_path) {
            $oldPath = str_replace('/storage/', '', $activity->banner_image_path);
            Storage::disk('public')->delete($oldPath);
        }

        $activity->delete();

        return redirect()->route('organization.events.index')->with('success', 'Aktivitas berhasil dihapus.');
    }

    // 8. Daftar relawan untuk 1 event
    public function volunteers($id): View
    {
        $organization = auth()->user()->organizationProfile;
        $event = $organization->volunteerActivities()->findOrFail($id);

        // $volunteers = $event->applications()->with('user.participantProfile')->get();
        // ditambahin el
        $volunteers = $event->applications()->with('participantProfile.user')->get();

        return view('organization.volunteers.index', compact('volunteers', 'event'));
    }

    // 9. Detail 1 relawan
    public function volunteerDetail($eventId, $volunteerId): View
{
    $organization = auth()->user()->organizationProfile;
    $event = $organization->volunteerActivities()->findOrFail($eventId);

    $application = $event->applications()->with('participantProfile.user')->findOrFail($volunteerId);

    return view('organization.volunteers.show', [
        'volunteer' => $application,
        'event' => $event
    ]);
}

}
