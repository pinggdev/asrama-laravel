<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Asrama;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        $users = User::all();
        $asramas = Asrama::all();
        return view('admin.siswa.form', compact('users', 'asramas'));
    }

    public function store(Request $request)
    {
        // validasi data yang diterima dari form
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'asrama_id' => 'required|integer'
        ]);
    
        // buat data siswa baru berdasarkan input dari form
        $siswa = new Siswa();
        $siswa->user_id = $request->user_id;
        $siswa->asrama_id = $request->asrama_id;
        $siswa->save();
    
        // redirect ke halaman index dengan pesan sukses
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }
    

    public function show(Siswa $siswa)
    {
        // 
    }

    public function edit(Siswa $siswa)
    {
        $asramas = Asrama::all();
        return view('admin.siswa.edit', compact('siswa', 'asramas'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'asrama_id' => 'required|exists:asramas,id',
        ]);

        $siswa->user_id = $request->user_id;
        $siswa->asrama_id = $request->asrama_id;
        $siswa->save();

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa updated successfully');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa deleted successfully');
    }
}
