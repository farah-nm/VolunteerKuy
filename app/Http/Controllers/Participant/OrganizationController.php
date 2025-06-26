<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\OrganizationProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrganizationController extends Controller
{
    public function index(Request $request): View
    {
        $query = OrganizationProfile::query()->where('status', 'active');

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('location')) {
            $query->where(function ($q) use ($request) {
                $q->where('city', 'like', '%' . $request->location . '%')
                  ->orWhere('province', 'like', '%' . $request->location . '%');
            });
        }

        $organizations = $query->latest()->paginate(9);
        // dd($organizations);
        return view('participant.organizations.search', compact('organizations'));
    }
}
