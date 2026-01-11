<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Bagian __construct DIHAPUS karena bikin error di Laravel terbaru

    public function index()
    {
        $role = Auth::user()->role;

        if ($role == 'superadmin') {
            // --- DATA KHUSUS SUPERADMIN ---
            $data = [
                'totalUser' => User::count(),
                'totalAdmin' => User::where('role', 'superadmin')->count(),
                'totalPetugas' => User::where('role', 'user')->count(),
                'totalPasien' => Pasien::count(), // Tetap ambil untuk info tambahan jika perlu
                'totalDokter' => Dokter::count(),
                'totalObat'   => Obat::sum('stok') ?? 0,
                'userRoleData' => User::select('role', DB::raw('count(*) as total'))
                                    ->groupBy('role')
                                    ->get()
            ];

            return view('dashboard.superadmin', $data);

        } else {
            // --- DATA KHUSUS USER/PETUGAS ---
            $data = [
                'totalPasien' => Pasien::count(),
                'totalDokter' => Dokter::count(),
                'totalObat'   => Obat::sum('stok') ?? 0,
                'obatData'    => Obat::select('jenis_obat', DB::raw('count(*) as total'))
                                    ->groupBy('jenis_obat')
                                    ->get()
            ];

            return view('dashboard.user', $data);
        }
    }
}
