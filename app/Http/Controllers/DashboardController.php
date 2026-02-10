<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Project;
use App\Models\ProjectAgenda;

class DashboardController extends Controller
{
    public function index()
    {
        $tot_cus = Customer::count();
        $tot_Prod = Project::count();
        $tot_Agen = ProjectAgenda::count();
        return view('dashboard', compact('tot_cus', 'tot_Prod', 'tot_Agen'));
    }
}
