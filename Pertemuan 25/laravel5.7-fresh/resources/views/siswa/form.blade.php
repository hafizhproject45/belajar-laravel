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

<h1 class="text-center p-4"><b>Form Siswa</b></h1>
<div class="container d-flex justify-content-center">
    <div class="card bg-secondary  text-center p-md-3 " style="width: 20rem;">
        <div class="card-body d-flex justify-content-center">
            <form action="{{ url('siswa') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('nis') }}" class="form-control" placeholder="NIS" name="nis" maxlength="11">
                    <label>NIS</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('nama_lengkap') }}" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" maxlength="100">
                    <label>Nama lengkap</label>
                </div>
                <div class="form-radio text-bg-secondary ">
                    <label>Jenis Kelamin</label>
                    <div class="form-radio">
                        <div class="form-check-inline">
                            <input class="form-check-input" value="L" type="radio" name="jenkel" @if(old('jenkel')=='L' ) checked @endif>
                            <label class="form-check-label">L</label>
                        </div>
                        <div class="form-check-inline mb-3">
                            <input class="form-check-input" value="P" type="radio" name="jenkel" @if(old('jenkel')=='P' ) checked @endif>
                            <label class="form-check-label">P</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <select name="goldar" class="form-select">
                        <option value="">- Pilih Golongan Darah -</option>
                        <option value="A" @if(old('goldar')=='A' ) selected @endif>A</option>
                        <option value="B" @if(old('goldar')=='B' ) selected @endif>B</option>
                        <option value="AB" @if(old('goldar')=='AB' ) selected @endif>AB</option>
                        <option value="O" @if(old('goldar')=='O' ) selected @endif>O</option>
                    </select>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
