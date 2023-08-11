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
<h1 class="text-center p-5"><b>Daftar Kelas SMKN 4 Bandung</b></h1>
<a href="{{ url('kelas/create') }}"><button type="button" class="btn btn-success mb-3"><b>+ </b>Tambah Data</button></a>
<a href="{{ url('siswa') }}"><button type="button" class="btn btn-primary mb-3">Tabel Siswa</button></a>
<a href="{{ url('guru') }}"><button type="button" class="btn btn-primary mb-3">Tabel Guru</button></a>

<div class="container">
    <div class="row">
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Jurusan</th>
                    <th>Lokasi Ruangan</th>
                    <th>Nama Wali Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $k)
                <tr>
                    <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
                    <td>{{ $k -> nama_kelas }}</td>
                    <td>{{ $k -> jurusan }}</td>
                    <td>{{ $k -> lokasi_ruangan }}</td>
                    <td>{{ $k -> nama_wali_kelas }}</td>
                    <td>
                        <a class=" btn btn-warning d-inline" href="{{ url('kelas/' . $k->id . 'edit') }}"><i class="bi bi-pencil-square"></i></a>
                        <form class="d-inline" action="{{ url('kelas', $k->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
