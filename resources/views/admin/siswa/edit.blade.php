@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Siswa</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" class="form form-horizontal">
                    @csrf
                    @method('PATCH')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>User</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" value="{{ $siswa->user->name }}" readonly>
                                <input type="hidden" name="user_id" value="{{ $siswa->user_id }}">
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
                                        <option value="{{ $asrama->id }}" {{ old('asrama_id', $siswa->asrama_id) == $asrama->id ? 'selected' : '' }}>{{ $asrama->name }}</option>
                                    @endforeach
                                </select>
                                @error('asrama_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                <a href="{{ route('siswa.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
