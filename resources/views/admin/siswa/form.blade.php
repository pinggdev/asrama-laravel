@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Siswa</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('siswa.store') }}" method="POST" class="form form-horizontal">
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
                                <label>Asrama</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-control @error('asrama_id') {{ 'is-invalid' }} @enderror" name="asrama_id">
                                    <option value="">Pilih Asrama</option>
                                    @foreach ($asramas as $asrama)
                                        <option value="{{ $asrama->id }}" {{ old('asrama_id') == $asrama->id ? 'selected' : '' }}>{{ $asrama->name }}</option>
                                    @endforeach
                                </select>
                                @error('asrama_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                                <a href="{{ route('siswa.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
