<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('admin.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.jadwal.form', compact('users'));
    }

    public function store(Request $request)
    {
        // validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'user_id' => 'required|integer|exists:users,id'
        ]);
    
        // buat data jadwal baru berdasarkan input dari form
        $jadwal = new Jadwal();
        $jadwal->nama_kegiatan = $request->nama_kegiatan;
        $jadwal->tanggal_kegiatan = $request->tanggal_kegiatan;
        $jadwal->user_id = $request->user_id;
        $jadwal->save();
    
        // redirect ke halaman index dengan pesan sukses
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil ditambahkan!');
    }

    public function show(Jadwal $jadwal)
    {
        return view('admin.jadwal.show', compact('jadwal'));
    }

    public function edit(Jadwal $jadwal)
    {
        $users = User::all();
        return view('admin.jadwal.edit', compact('jadwal', 'users'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $jadwal->nama_kegiatan = $request->nama_kegiatan;
        $jadwal->tanggal_kegiatan = $request->tanggal_kegiatan;
        $jadwal->user_id = $request->user_id;
        $jadwal->save();

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal updated successfully');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal deleted successfully');
    }
}
