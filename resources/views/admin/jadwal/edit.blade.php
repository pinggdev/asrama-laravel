@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Jadwal</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST" class="form form-horizontal">
                    @csrf
                    @method('PATCH')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nama Kegiatan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control @error('nama_kegiatan') {{ 'is-invalid' }} @enderror" name="nama_kegiatan" value="{{ old('nama_kegiatan', $jadwal->nama_kegiatan) }}">
                                @error('nama_kegiatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Tanggal Kegiatan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="date" class="form-control @error('tanggal_kegiatan') {{ 'is-invalid' }} @enderror" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan', \Carbon\Carbon::parse($jadwal->tanggal_kegiatan)->format('Y-m-d')) }}">
                                @error('tanggal_kegiatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col-md-4">
                                <label>User</label>
                            </div>
                            <div class="col-md-8 form-group">
                                @if (Auth::user()->role === "siswa" && Auth::user()->id == $jadwal->user->id)
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" value="{{  $jadwal->user->name }}" readonly>
                                        <input type="hidden" name="user_id" value="{{ $jadwal->user->id }}">
                                    </div>
                                @elseif(Auth::user()->role === "admin")
                                    <select class="form-control @error('user_id') {{ 'is-invalid' }} @enderror" name="user_id">
                                        <option value="">Pilih User</option>
                                        @foreach ($users as $user)
                                            @if ($user->role == 'siswa')
                                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                <a href="{{ route('jadwal.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
