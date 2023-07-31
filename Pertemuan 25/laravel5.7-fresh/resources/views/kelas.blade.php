@extends('layouts.main')
@section('isi')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('error') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
<h1 class="text-center p-5">Daftar Kelas SMKN 4 Bandung</h1>
<a href="{{ url('kelas/create') }}"><button type="button" class="btn btn-success mb-3"><b>+ </b>Tambah Data</button></a>
<div class="container">
    <div class="row">
        <table class="table table-striped" border="1">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Jurusan</th>
                <th>Lokasi Ruangan</th>
                <th>Nama Wali Kelas</th>
            </tr>
            @foreach ($kelas as $k)
            <tr>
                <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
                <td>{{ $k -> nama_kelas }}</td>
                <td>{{ $k -> jurusan }}</td>
                <td>{{ $k -> lokasi_ruangan }}</td>
                <td>{{ $k -> nama_wali_kelas }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
