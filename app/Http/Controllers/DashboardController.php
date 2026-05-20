<?php

namespace App\Http\Controllers;

use App\Models\Airdrop;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index(): View
    {
        $airdrops = Airdrop::all();
        
        $totalAirdrops = $airdrops->count();
        $activeAirdrops = $airdrops->filter(fn($a) => $a->status === 'active')->count();
        $completedAirdrops = $airdrops->filter(fn($a) => $a->is_completed)->count();
        $totalEarnings = $airdrops->filter(fn($a) => $a->is_completed)->sum('earnings');

        return view('dashboard', [
            'totalAirdrops' => $totalAirdrops,
            'activeAirdrops' => $activeAirdrops,
            'completedAirdrops' => $completedAirdrops,
            'totalEarnings' => $totalEarnings,
        ]);
    }
}
