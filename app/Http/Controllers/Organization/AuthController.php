<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\OrganizationProfile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // tambahkan validasi untuk field profil organisasi lainnya
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'organization',
        ]);

        OrganizationProfile::create([
            'user_id' => $user->id,
            'name' => $request->organization_name,
            // isi field profil organisasi lainnya
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::ORGANIZATION_HOME); // Definisikan ORGANIZATION_HOME di RouteServiceProvider
    }

    // ... tambahkan method untuk login dan logout jika diperlukan di sini atau gunakan yang sudah disediakan Breeze/Jetstream
}
