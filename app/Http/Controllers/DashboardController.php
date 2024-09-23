<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Devis;
use App\Models\VisitorLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVisitors = VisitorLog::count();
        $dailyVisitors = VisitorLog::whereDate('created_at', today())->count();
        $totalDevis = Devis::count();
        $totalUsers = User::count();
        
        $data = VisitorLog::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->where('created_at', '>=', Carbon::now()->subDays(7))
        ->get();

    // Prepare data for ApexCharts
    $dates = $data->pluck('date')->toArray();
    $counts = $data->pluck('count')->toArray();
        return view('backend.index', [
            'totalVisitors'=> $totalVisitors,
            'dailyVisitors'=> $dailyVisitors,
            'totalDevis'=> $totalDevis,
            'totalUsers'=> $totalUsers,
            'dates'=> $dates,
            'counts'=> $counts
        ]);

    }
}
