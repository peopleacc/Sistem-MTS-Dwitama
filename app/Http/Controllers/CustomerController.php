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
        $user = Customer::findOrFail($id);

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

    public function destroy($id)
    {
        $Customer = Customer::findOrFail($id);
        $Customer->delete();

        return redirect()->route('customer.index')
            ->with('success', 'Mekanik berhasil dihapus!');
    }

}
