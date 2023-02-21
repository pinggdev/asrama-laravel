@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Jadwal</h4>
    </div>
    <div class="card-content">
        <div class="card-body">           
            <div class="row">
                <div class="col-8 align-self-center">
                    <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-sm align-self-center">Tambah Jadwal</a>
                </div>
            </div>
            <!-- Table with outer spacing -->
            <div class="table-responsive">         
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA KEGIATAN</th>
                            <th>TANGGAL KEGIATAN</th>
                            <th>PENANGGUNG JAWAB</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $x = 1;
                        @endphp
                        @foreach ($jadwals as $jadwal)
                            @if (Auth::user()->role === "siswa" && Auth::user()->id == $jadwal->user->id)
                            
                            <tr>
                                <td scope="row" style="vertical-align: middle;">{{$x}}</td>
                                <td class="text-bold-500">{{ $jadwal->nama_kegiatan }}</td>
                                <td class="text-bold-500">{{ $jadwal->tanggal_kegiatan }}</td>
                                <td class="text-bold-500">{{ $jadwal->user->name }}</td>
                                <td class="text-bold-500">
                                    <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        @if (Auth::user()->role === "admin")     
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        @endif
                                    </form>
                                </td>
                                @php
                                    $x++;
                                @endphp
                            </tr>
                            @elseif (Auth::user()->role === "admin")
                                <tr>
                                    <td scope="row" style="vertical-align: middle;">{{$x}}</td>
                                    <td class="text-bold-500">{{ $jadwal->nama_kegiatan }}</td>
                                    <td class="text-bold-500">{{ $jadwal->tanggal_kegiatan }}</td>
                                    <td class="text-bold-500">{{ $jadwal->user->name }}</td>
                                    <td class="text-bold-500">
                                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            @if (Auth::user()->role === "admin")     
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            @endif
                                        </form>
                                    </td>
                                    @php
                                        $x++;
                                    @endphp
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
