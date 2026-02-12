<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Customer;
use App\Models\Project;
use App\Models\ProjectAgenda;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $isSales = strtolower($user->role) === 'sales';

        if ($isSales) {
            // Sales: filter by own customers
            $tot_cus = Customer::where('user_id', $user->id)->count();

            $customerIds = Customer::where('user_id', $user->id)->pluck('custid');
            $tot_Prod = Project::whereIn('custid', $customerIds)->count();

            $projectIds = Project::whereIn('custid', $customerIds)->pluck('project_id');
            $tot_Agen = ProjectAgenda::whereIn('project_id', $projectIds)->count();

            $projects = Project::with('customer')
                ->whereIn('custid', $customerIds)
                ->latest()
                ->take(10)
                ->get();

            return view('dashboard', compact('tot_cus', 'tot_Prod', 'tot_Agen', 'isSales', 'projects'));
        }

        // Admin: global counts
        $tot_cus = Customer::count();
        $tot_Prod = Project::count();
        $tot_Agen = ProjectAgenda::count();

        // Chart 1: Project per Status (0=Progress, 1=Pending, 2=Selesai)
        $statusCounts = Project::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        $chartStatus = [
            'labels' => ['Progress', 'Pending', 'Selesai'],
            'data' => [
                $statusCounts[0] ?? 0,
                $statusCounts[1] ?? 0,
                $statusCounts[2] ?? 0,
            ],
        ];

        // Chart 2: Project per Bulan (6 bulan terakhir)
        $monthLabels = [];
        $monthData = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthLabels[] = $date->translatedFormat('M Y');
            $monthData[] = Project::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        }

        $chartBulanan = [
            'labels' => $monthLabels,
            'data' => $monthData,
        ];

        // Chart 3: Top 5 Sales (by project count)
        $topSales = User::where('role', 'sales')
            ->withCount([
                'customers as project_count' => function ($q) {
                    $q->select(DB::raw('count(t_project.project_id)'))
                        ->join('t_project', 't_customer.custid', '=', 't_project.custid');
                }
            ])
            ->orderByDesc('project_count')
            ->take(5)
            ->get();

        $chartTopSales = [
            'labels' => $topSales->pluck('name')->toArray(),
            'data' => $topSales->pluck('project_count')->toArray(),
        ];

        $projects = Project::with('customer')
            ->latest()
            ->take(10)
            ->get();

        return view('dashboard', compact(
            'tot_cus',
            'tot_Prod',
            'tot_Agen',
            'isSales',
            'chartStatus',
            'chartBulanan',
            'chartTopSales',
            'projects'
        ));
    }
}
