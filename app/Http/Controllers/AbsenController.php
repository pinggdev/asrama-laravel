<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $absens = Absen::all();
        return view('admin.absen.index', compact('absens'));
    }

    public function create()
    {
        $users = User::all();
        $jadwals = Jadwal::all();
        return view('admin.absen.form', compact('users', 'jadwals'));
    }

    public function store(Request $request)
    {
        // validate data from the form
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'jadwal_id' => 'required|integer|exists:jadwals,id',
            'status' => 'required|in:hadir,tidak_hadir',
        ]);

        // create new Absen instance
        $absen = new Absen();
        $absen->user_id = $request->user_id;
        $absen->jadwal_id = $request->jadwal_id;
        $absen->status = $request->status;
        $absen->save();

        // redirect to index page with success message
        return redirect()->route('absen.index')->with('success', 'Absen berhasil ditambahkan!');
    }

    public function edit(Absen $absen)
    {
        $users = User::all();
        $jadwals = Jadwal::all();
        return view('admin.absen.edit', compact('absen', 'users', 'jadwals'));
    }

    public function update(Request $request, Absen $absen)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'jadwal_id' => 'required|integer|exists:jadwals,id',
            'status' => 'required|in:hadir,tidak_hadir',
        ]);

        $absen->user_id = $request->user_id;
        $absen->jadwal_id = $request->jadwal_id;
        $absen->status = $request->status;
        $absen->save();

        return redirect()->route('absen.index')->with('success', 'Absen berhasil diupdate!');
    }

    public function destroy(Absen $absen)
    {
        $absen->delete();

        return redirect()->route('absen.index')->with('success', 'Absen berhasil dihapus!');
    }

    public function rekapBulanan(Request $request)
    {
        $users = User::where('role', 'siswa')->get();
        $data = [];
    
        $bulan = $request->input('bulan');
        if ($bulan) {
            $absens = Absen::whereMonth('created_at', '=', $bulan)->get();
            if ($absens->isEmpty()) {
                foreach ($users as $user) {
                    $hadir = 0;
                    $tidak_hadir = 0;
            
                    foreach ($absens as $absen) {
                        if ($absen->user_id == $user->id) {
                            if ($absen->status == 'hadir') {
                                $hadir++;
                            } else {
                                $tidak_hadir++;
                            }
                        }
                    }
            
                    if ($hadir > 0 || $tidak_hadir > 0) {
                        $data[] = [
                            'user' => $user->name,
                            'hadir' => $hadir,
                            'tidak_hadir' => $tidak_hadir
                        ];
                    }
                }
            }
        } else {
            $absens = Absen::all();
        }
    
        foreach ($users as $user) {
            $hadir = 0;
            $tidak_hadir = 0;
    
            foreach ($absens as $absen) {
                if ($absen->user_id == $user->id) {
                    if ($absen->status == 'hadir') {
                        $hadir++;
                    } else {
                        $tidak_hadir++;
                    }
                }
            }
    
            if ($hadir > 0 || $tidak_hadir > 0) {
                $data[] = [
                    'user' => $user->name,
                    'hadir' => $hadir,
                    'tidak_hadir' => $tidak_hadir
                ];
            }
        }
    
        return view('admin.rekap.index', compact('data'));
    }
    
}
