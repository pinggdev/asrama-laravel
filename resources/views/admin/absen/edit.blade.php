@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Absen</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('absen.update', $absen->id) }}" method="POST" class="form form-horizontal">
                    @csrf
                    @method('PATCH')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nama Peserta</label>   
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" value="{{ $absen->user->name }}" disabled>
                                <input type="hidden" name="user_id" value="{{ $absen->user->id }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Jadwal</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" value="{{ $absen->jadwal->nama_kegiatan }} - {{$absen->jadwal->tanggal_kegiatan}}" disabled>
                                <input type="hidden" name="jadwal_id" value="{{ $absen->jadwal->id }}">
                            </div>
                        </div>                      
                        <div class="row">
                            <div class="col-md-4">
                                <label>Status</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-control @error('status') {{ 'is-invalid' }} @enderror" name="status">
                                    <option value="">Pilih Status</option>
                                    <option value="hadir" {{ old('status', $absen->status) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                    <option value="tidak_hadir" {{ old('status', $absen->status) == 'tidak_hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                <a href="{{ route('absen.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
