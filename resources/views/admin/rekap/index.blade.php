@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Rekap Absen Bulanan</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <form method="get" action="{{ route('absen.rekapbulanan') }}">
                        <div class="form-group row">
                            <label for="bulan" class="col-md-3 col-form-label text-md-right">Bulan</label>

                            <div class="col-md-6">
                                <select id="bulan" name="bulan" class="form-control">
                                    <option value="">-- Semua --</option>
                                    <option value="01"{{ old('bulan') == '01' ? ' selected' : '' }}>Januari</option>
                                    <option value="02"{{ old('bulan') == '02' ? ' selected' : '' }}>Februari</option>
                                    <option value="03"{{ old('bulan') == '03' ? ' selected' : '' }}>Maret</option>
                                    <option value="04"{{ old('bulan') == '04' ? ' selected' : '' }}>April</option>
                                    <option value="05"{{ old('bulan') == '05' ? ' selected' : '' }}>Mei</option>
                                    <option value="06"{{ old('bulan') == '06' ? ' selected' : '' }}>Juni</option>
                                    <option value="07"{{ old('bulan') == '07' ? ' selected' : '' }}>Juli</option>
                                    <option value="08"{{ old('bulan') == '08' ? ' selected' : '' }}>Agustus</option>
                                    <option value="09"{{ old('bulan') == '09' ? ' selected' : '' }}>September</option>
                                    <option value="10"{{ old('bulan') == '10' ? ' selected' : '' }}>Oktober</option>
                                    <option value="11"{{ old('bulan') == '11' ? ' selected' : '' }}>November</option>
                                    <option value="12"{{ old('bulan') == '12' ? ' selected' : '' }}>Desember</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Table with outer spacing -->
            <div class="table-responsive">         
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA SISWA</th>
                            <th>JUMLAH HADIR</th>
                            <th>JUMLAH TIDAK HADIR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $x = 1;
                        @endphp
                            @foreach ($data as $dt)
                            <tr>
                                <td scope="row" style="vertical-align: middle;">{{$x}}</td>
                                <td class="text-bold-500">{{ $dt['user'] }}</td>
                                <td class="text-bold-500">{{ $dt['hadir'] }}</td>
                                <td class="text-bold-500">{{ $dt['tidak_hadir'] }}</td>
                                </tr>
                            @php
                            $x++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                                    
    </div>
@endsection
