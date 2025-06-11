<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Report;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalAccounts = User::count();
        $totalReports = Report::count();

        return view('admin.dashboard', [
            'totalAccounts' => $totalAccounts,
            'totalReports' => $totalReports,
        ]);
    }
}
