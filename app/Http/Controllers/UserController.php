<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 1. Tampilan Daftar User
    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // 2. Form Tambah User
    public function create() {
        return view('admin.users.create');
    }

    // 3. Simpan User ke Database
    public function store(Request $request) {
        $request->validate([
            'name'      => 'required|string|max:255',
            // Kita beri tahu Laravel untuk mengecek kolom 'email', bukan 'username'
            'username'  => 'required|string|unique:users,email|max:255',
            'password'  => 'required|min:4',
            'role'      => 'required|in:superadmin,user',
        ]);

        // Simpan ke database menggunakan nama kolom yang benar yaitu 'email'
        User::create([
            'name'      => $request->name,
            'email'     => $request->username, // Map input 'username' ke kolom 'email'
            'password'  => Hash::make($request->password),
            'role'      => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }
    // 4. Form Edit User
    public function edit($id) {
        $user = User::findOrFail($id); // Cari user, kalau gak ada otomatis error 404
        return view('admin.users.edit', compact('user'));
    }

    // 5. Update Data User
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $request->validate([
            'name'      => 'required|string|max:255',
            // UBAH 'username' MENJADI 'email' jika itu nama kolom di databasemu
            'username'  => 'required|string|max:255|unique:users,email,'.$id,
            'role'      => 'required|in:superadmin,user',
        ]);

        $data = [
            'name'     => $request->name,
            'email'    => $request->username, // Pastikan ini juga disesuaikan
            'role'     => $request->role,
        ];


        // Ganti password hanya jika diisi di form
        if ($request->filled('password')) {
            $request->validate(['password' => 'min:4']);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui!');
    }

    // 6. Hapus User
    public function destroy($id) {
        $user = User::findOrFail($id);

        // Proteksi: Jangan biarkan superadmin menghapus dirinya sendiri yang sedang login
        if ($user->id == auth()->id()) {
            return redirect()->route('users.index')->with('error', 'Anda tidak bisa menghapus akun sendiri!');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }
}
