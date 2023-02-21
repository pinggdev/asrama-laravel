@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Jadwal</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('jadwal.store') }}" method="POST" class="form form-horizontal">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nama Kegiatan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control @error('nama_kegiatan') {{ 'is-invalid' }} @enderror" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}" placeholder="Masukkan Nama Kegiatan">
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
                                <input type="date" class="form-control @error('tanggal_kegiatan') {{ 'is-invalid' }} @enderror" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan') }}" placeholder="Masukkan Tanggal Kegiatan">
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
                                <select class="form-control @error('user_id') {{ 'is-invalid' }} @enderror" name="user_id">
                                    <option value="">Pilih User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                                <a href="{{ route('jadwal.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
