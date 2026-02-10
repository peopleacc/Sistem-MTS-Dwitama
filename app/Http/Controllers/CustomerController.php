<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view("customer.index", compact("customers"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'alamat' => 'nullable|string|max:250',
            'lokasi' => 'nullable|string|max:100',
            'npwp' => 'nullable|string|max:20',
            'notelp' => 'nullable|string|max:20',
            'emailid' => 'nullable|email|max:50',
            'bidang' => 'nullable|string|max:100',
        ]);

        Customer::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'lokasi' => $request->lokasi,
            'user_id' => Auth::id(),
            'npwp' => $request->npwp,
            'notelp' => $request->notelp,
            'emailid' => $request->emailid,
            'bidang' => $request->bidang,
            'create_by' => now(),
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer berhasil ditambahkan!');
    }
}
