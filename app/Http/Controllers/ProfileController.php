<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request)
    {
        $user = \App\Models\User::find(Auth::id());

        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $user->id,
            'email' => 'nullable|email|max:50',
            'notelp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'password' => 'nullable|min:6|confirmed',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->notelp = $request->notelp;
        $user->alamat = $request->alamat;

        // Update password if provided (model cast 'hashed' will auto-hash)
        if ($request->filled('password')) {
            $user->password = $request->password;
        }

        $user->update_date = now();
        $user->save();

        // Handle profile photo upload separately via raw query (binary safe)
        if ($request->hasFile('foto')) {
            $imageData = file_get_contents($request->file('foto')->getRealPath());
            \Illuminate\Support\Facades\DB::table('users')
                ->where('id', $user->id)
                ->update(['foto' => $imageData]);
        }

        return redirect()->route('profile.edit')->with('success', 'Profile berhasil diperbarui!');
    }

    /**
     * Return profile photo as image response.
     */
    public function photo($id)
    {
        $user = \App\Models\User::findOrFail($id);

        if (!$user->foto) {
            abort(404);
        }

        // Detect image type from binary data
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($user->foto);

        return response($user->foto)
            ->header('Content-Type', $mimeType)
            ->header('Cache-Control', 'public, max-age=3600');
    }
}
