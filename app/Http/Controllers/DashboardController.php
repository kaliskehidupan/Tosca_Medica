<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\RekamMedis;
use App\Models\User; // Tambahkan ini untuk menghitung total petugas
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Data dasar yang dikirim ke view
        $data = [
            'role' => $user->role,
            'name' => $user->name,
            'countPasien' => Pasien::count(),
            'countDokter' => Dokter::count(),
            'countRM'     => RekamMedis::count(),
            'countUser'   => User::count(), // Penting untuk statistik Superadmin
        ];

        return view('dashboard.index', $data);
    }
}
