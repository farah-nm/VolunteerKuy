<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AccountController extends Controller
{

    public function index(): View
    {
        $users = User::where('role', '!=', 'admin')->latest()->paginate(10); // Exclude admin role and paginate
        return view('admin.accounts.index', compact('users'));
    }

    public function edit(User $user): View
    {
        return view('admin.accounts.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:active,suspended',
        ]);

        $user->update(['status' => $request->status]);

        return redirect()->route('admin.accounts.index')->with('success', 'Status akun berhasil diubah.');
    }

}
