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
            <form action="{{ url('kelas') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('nama_kelas') }}" class="form-control" placeholder="Nama Kelas" name="nama_kelas" maxlength="100">
                    <label>Nama Kelas</label>
                </div>
                <div class="mb-3">
                    <select name="jurusan" class="form-select">
                        <option value="">- Pilih Jurusan -</option>
                        <option value="RPL" @if(old('jurusan')=='RPL' ) selected @endif>RPL</option>
                        <option value="DKV" @if(old('jurusan')=='DKV' ) selected @endif>DKV</option>
                        <option value="TKJ" @if(old('jurusan')=='TKJ' ) selected @endif>TKJ</option>
                        <option value="TITL" @if(old('jurusan')=='TITL' ) selected @endif>TITL</option>
                        <option value="TOI" @if(old('jurusan')=='TOI' ) selected @endif>TOI</option>
                        <option value="TAV" @if(old('jurusan')=='TAV' ) selected @endif>TAV</option>
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('lokasi_ruangan') }}" class="form-control" placeholder="Lokasi Ruangan" name="lokasi_ruangan" maxlength="100">
                    <label>Lokasi Ruangan</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('nama_wali_kelas') }}" class="form-control" placeholder="Nama Wali Kelas" name="nama_wali_kelas" maxlength="100">
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
