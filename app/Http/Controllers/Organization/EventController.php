<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\VolunteerActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    public function index(): View
    {
        $events = VolunteerActivity::where('organization_profile_id', auth()->user()->organizationProfile->id)
            ->latest()
            ->paginate(10);

        return view('organization.events.index', compact('events'));
    }

    public function create(): View
    {
        return view('organization.events.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'location_address' => 'required|string|max:255',
            'location_city' => 'required|string|max:255',
            'location_province' => 'required|string|max:255',
            'start_date' => 'required|date_format:Y-m-d\TH:i',
            'end_date' => 'required|date_format:Y-m-d\TH:i|after:start_date',
            'registration_deadline' => 'required|date_format:Y-m-d\TH:i|before:start_date',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slots_available' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('banner_image')) {
            $path = $request->file('banner_image')->store('public/event_banners');
            $data['banner_image_path'] = Storage::url($path);
        }

        $data['organization_profile_id'] = auth()->user()->organizationProfile->id;

        VolunteerActivity::create($data);

        return redirect()->route('organization.events.index')->with('success', 'Event berhasil ditambahkan.');
    }

    public function show(VolunteerActivity $event): View
    {
        if ($event->organization_profile_id !== auth()->user()->organizationProfile->id) {
            abort(403);
        }

        return view('organization.events.show', compact('event'));
    }

    public function edit(VolunteerActivity $event): View
    {
        if ($event->organization_profile_id !== auth()->user()->organizationProfile->id) {
            abort(403);
        }

        return view('organization.events.edit', compact('event'));
    }

    public function update(Request $request, VolunteerActivity $event): RedirectResponse
    {
        if ($event->organization_profile_id !== auth()->user()->organizationProfile->id) {
            abort(403);
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'location_address' => 'required|string|max:255',
            'location_city' => 'required|string|max:255',
            'location_province' => 'required|string|max:255',
            'start_date' => 'required|date_format:Y-m-d\TH:i',
            'end_date' => 'required|date_format:Y-m-d\TH:i|after:start_date',
            'registration_deadline' => 'required|date_format:Y-m-d\TH:i|before:start_date',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slots_available' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('banner_image')) {
            if ($event->banner_image_path) {
                Storage::delete(str_replace('/storage', 'public', $event->banner_image_path));
            }

            $path = $request->file('banner_image')->store('public/event_banners');
            $data['banner_image_path'] = Storage::url($path);
        }

        $event->update($data);

        return redirect()->route('organization.events.index')->with('success', 'Event berhasil diupdate.');
    }

    public function destroy(VolunteerActivity $event): RedirectResponse
    {
        if ($event->organization_profile_id !== auth()->user()->organizationProfile->id) {
            abort(403);
        }

        if ($event->banner_image_path) {
            Storage::delete(str_replace('/storage', 'public', $event->banner_image_path));
        }

        $event->delete();

        return redirect()->route('organization.events.index')->with('success', 'Event berhasil dihapus.');
    }
}
