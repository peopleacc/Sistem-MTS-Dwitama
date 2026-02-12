<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectAgenda;
class AgendaController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (strtolower($user->role) === 'sales') {
            $agenda = ProjectAgenda::whereHas('project.customer', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })->with('project')->get();
        } else {
            $agenda = ProjectAgenda::with('project')->get();
        }

        return view('agenda.index', compact('agenda'));
    }
}
