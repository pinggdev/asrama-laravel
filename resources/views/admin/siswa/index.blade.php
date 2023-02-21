@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Siswa</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-8 align-self-center">
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm align-self-center">Tambah Siswa</a>
                </div>
            </div>
            <!-- Table with outer spacing -->
            <div class="table-responsive">         
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>ASRAMA</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $x = 1;
                        @endphp
                        @foreach ($siswas as $siswa)
                            <tr>
                                <td scope="row" style="vertical-align: middle;">{{$x}}</td>
                                <td class="text-bold-500">{{ $siswa->user->name }}</td>
                                <td class="text-bold-500">{{ $siswa->asrama->name }}</td>
                                <td class="text-bold-500">
                                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                @php
                                    $x++;
                                @endphp
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
