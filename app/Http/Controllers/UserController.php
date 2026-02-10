<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $Admin = User::where('role', 'admin')
            ->select(['id', 'name', 'email', 'notelp', 'alamat', 'role', 'status'])
            ->get();
        $Sales = User::where('role', 'sales')
            ->select(['id', 'name', 'email', 'notelp', 'alamat', 'role', 'status'])
            ->get();
        return view('users.index', compact('Admin', 'Sales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'nullable|email|max:50',
            'notelp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,sales',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'notelp' => $request->notelp,
            'alamat' => $request->alamat,
            'password' => $request->password, // auto-hashed by model cast
            'role' => $request->role,
            'level' => $request->role === 'admin' ? 'AD' : 'SL',
            'status' => 1,
            'create_by' => now(),
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }
}

