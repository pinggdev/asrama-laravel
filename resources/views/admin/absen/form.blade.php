@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Absen</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('absen.store') }}" method="POST" class="form form-horizontal">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>User</label>
                            </div>
                            <div class="col-md-8 form-group">
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Jadwal</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-control @error('jadwal_id') {{ 'is-invalid' }} @enderror" name="jadwal_id">
                                    <option value="">Pilih Jadwal</option>
                                    @foreach ($jadwals as $jadwal)
                                        <option value="{{ $jadwal->id }}" {{ old('jadwal_id') == $jadwal->id ? 'selected' : '' }}>{{ $jadwal->nama_kegiatan }} - {{ $jadwal->tanggal_kegiatan }} - ({{$jadwal->user->name}})</option>
                                    @endforeach
                                </select>
                                @error('jadwal_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Status</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-control @error('status') {{ 'is-invalid' }} @enderror" name="status">
                                    <option value="">Pilih Status</option>
                                    <option value="hadir" {{ old('status') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                    <option value="tidak_hadir" {{ old('status') == 'tidak_hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                                <a href="{{ route('absen.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
