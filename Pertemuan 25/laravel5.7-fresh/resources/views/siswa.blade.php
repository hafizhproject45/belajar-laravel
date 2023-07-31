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

<h1 class="text-center p-5"><b>Daftar Siswa SMKN 4 Bandung</b></h1>
<a href="{{ url('siswa/create') }}"><button type="button" class="btn btn-success mb-3"><b>+ </b>Tambah Data</button></a>
<div class="container">
    <div class="row">
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Golongan Darah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $s)
                <tr>
                    <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
                    <td>{{ $s -> nama_lengkap }}</td>
                    <td>{{ $s -> jenkel }}</td>
                    <td>{{ $s -> goldar }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
