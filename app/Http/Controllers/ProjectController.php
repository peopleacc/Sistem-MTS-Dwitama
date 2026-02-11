<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectAgenda;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('customer')->get();
        return view("project.index", compact("projects"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:250',
            'custid' => 'nullable|integer|exists:t_customer,custid',
            'alamat' => 'nullable|string|max:250',
            'lokasi' => 'nullable|string|max:50',
            'ket' => 'nullable|string',
            'level' => 'nullable|string|max:50',
            'wil' => 'nullable|string|max:2',
        ]);

        Project::create([
            'project_name' => $request->project_name,
            'custid' => $request->custid,
            'alamat' => $request->alamat,
            'lokasi' => $request->lokasi,
            'ket' => $request->ket,
            'status' => 0,
            'level' => $request->level,
            'wil' => $request->wil,
        ]);

        return redirect()->route('project.index')->with('success', 'Project berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // Validasi Input
        $request->validate([
            'nama' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'npwp' => 'required|string|max:255',
            'notelp' => 'required|string|max:255',
            'emailid' => 'required|email|max:255',
            'lokasi' => 'required|string|max:255', // Cek email unik kecuali untuk ID ini
            'alamat' => 'nullable|min:6', // Password opsional
        ]);

        // Cari User
        $user = Project::findOrFail($id);

        // Update Data
        $user->nama = $request->nama;
        $user->bidang = $request->bidang;
        $user->npwp = $request->npwp;
        $user->notelp = $request->notelp;
        $user->emailid = $request->emailid;
        $user->lokasi = $request->lokasi;
        $user->alamat = $request->alamat;

        // Update Password Hanya Jika Ada


        $user->save();

        // Redirect dengan Pesan Sukses
        return redirect()->route('customer.index')->with('success', 'User updated successfully.');
    }


    public function show($id)
    {
        $project = Project::with([
            'customer',
            'agendas' => function ($q) {
                $q->orderBy('created_at', 'asc');
            },
            'pics'
        ])->findOrFail($id);

        return view('project.show', compact('project'));
    }

    public function storeAgenda(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'tgl' => 'required|date',
            'jam' => 'nullable',
            'lokasi' => 'nullable|string|max:50',
            'ket' => 'required|string',
        ]);

        ProjectAgenda::create([
            'project_id' => $project->project_id,
            'tgl' => $request->tgl,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'ket' => $request->ket,
            'status' => 0,
        ]);

        return redirect()->route('project.show', $project->project_id)->with('success', 'Agenda berhasil ditambahkan!');
    }
}
