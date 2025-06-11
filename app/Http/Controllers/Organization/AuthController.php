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
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showRegistrationForm(): View
    {
        return view('organization.auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'organization_name' => ['required', 'string', 'max:255', 'unique:' . User::class . ',name'], // Validasi untuk nama organisasi (akan disimpan sebagai name di users)
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'organization',

        ]);

        $user = User::create([
            'name' => $request->organization_name, // Gunakan organization_name untuk kolom name di users
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'organization',
        ]);
        Log::info('Mencoba membuat OrganizationProfile untuk user ID: ' . $user->id . ' dengan nama: ' . $request->organization_name);

        try {
        OrganizationProfile::create([
            'user_id' => $user->id,
            'name' => $request->organization_name,
            'description' => '',
            'address' => '',
            'city' => '',
            'province' => '',
            'postal_code' => '',
            'phone_number' => '',
            'website_url' => '',
            'logo_path' => '',
            'verification_status' => 'pending',
            'verified_by' => null,
            'verified_at' => null,

        ]);
        } catch (\Exception $e) {
            Log::error('Gagal membuat OrganizationProfile: ' . $e->getMessage());
            return redirect()->route('register.organization')->with('error', 'Terjadi kesalahan saat membuat profil organisasi. Silakan coba lagi.');
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::ORGANIZATION_HOME);
    }


}
