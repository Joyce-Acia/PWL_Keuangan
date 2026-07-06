<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $today = Carbon::today();
        $user = auth()->user();

        if ($user && $user->role !== 'admin') {
            return view('dashboard', [
                'showAdminDashboard' => false,
                'today' => $today,
            ]);
        }

        $totalExpenses = (float) Expense::sum('nominal');
        $totalIncomes = (float) Income::sum('nominal');

        $todayExpenses = (float) Expense::whereDate('tanggal', $today)->sum('nominal');
        $todayIncomes = (float) Income::whereDate('tanggal', $today)->sum('nominal');

        $todayBalance = $todayIncomes - $todayExpenses;
        $overallBalance = $totalIncomes - $totalExpenses;

        return view('dashboard', [
            'showAdminDashboard' => true,
            'totalExpenses' => $totalExpenses,
            'totalIncomes' => $totalIncomes,
            'todayExpenses' => $todayExpenses,
            'todayIncomes' => $todayIncomes,
            'todayBalance' => $todayBalance,
            'overallBalance' => $overallBalance,
            'today' => $today,
        ]);
    }
}

