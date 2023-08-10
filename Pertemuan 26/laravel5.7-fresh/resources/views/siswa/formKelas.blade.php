@extends('layouts.main')
@section('isi')
@if (session('error'))
{{ session('error') }}
@endif
@if(count($errors) > 0)
<div class="alert alert-danger">
    <Strong>Perhatian</Strong>
    <br>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<h1 class="text-center p-4"><b>Form Kelas</b></h1>
<div class="container d-flex justify-content-center">
    <div class="card bg-secondary  text-center p-md-3 " style="width: 20rem;">
        <div class="card-body d-flex justify-content-center">
            <form action="{{ url('kelas', @$kelas->id) }}" method="POST">
                @csrf
                @csrf
                @if(!empty($kelas))
                @method('PATCH')
                @endif
                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('nama_kelas', @$kelas->nama_kelas) }}" class="form-control" placeholder="Nama Kelas" name="nama_kelas" maxlength="100">
                    <label>Nama Kelas</label>
                </div>
                <div class="mb-3">
                    <select name="jurusan" class="form-select">
                        <option value="">- Pilih Jurusan -</option>
                        <option value="RPL" {{ old('jurusan', @$kelas->jurusan) == 'RPL' ? 'selected' : ''}}>RPL</option>
                        <option value="DKV" {{ old('jurusan', @$kelas->jurusan) == 'DKV' ? 'selected' : ''}}>DKV</option>
                        <option value="TKJ" {{ old('jurusan', @$kelas->jurusan) == 'TKJ' ? 'selected' : ''}}>TKJ</option>
                        <option value="TITL" {{ old('jurusan', @$kelas->jurusan) == 'TITL' ? 'selected' : ''}}>TITL</option>
                        <option value="TOI" {{ old('jurusan', @$kelas->jurusan) == 'TOI' ? 'selected' : ''}}>TOI</option>
                        <option value="TAV" {{ old('jurusan', @$kelas->jurusan) == 'TAV' ? 'selected' : ''}}>TAV</option>
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('lokasi_ruangan', @$kelas->lokasi_ruangan) }}" class="form-control" placeholder="Lokasi Ruangan" name="lokasi_ruangan" maxlength="100">
                    <label>Lokasi Ruangan</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('nama_wali_kelas', @$kelas->nama_wali_kelas) }}" class="form-control" placeholder="Nama Wali Kelas" name="nama_wali_kelas" maxlength="100">
                    <label>Nama Wali Kelas</label>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
