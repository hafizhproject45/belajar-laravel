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
            <form action="{{ url('siswa', @$siswa->id) }}" method="POST">
                @csrf
                @if(!empty($siswa))
                @method('PATCH')
                @endif

                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('nis', @$siswa->nis) }}" class="form-control" placeholder="NIS" name="nis" maxlength="11">
                    <label>NIS</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('nama_lengkap', @$siswa->nama_lengkap) }}" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" maxlength="100">
                    <label>Nama lengkap</label>
                </div>
                <div class="form-radio text-bg-secondary ">
                    <label>Jenis Kelamin</label>
                    <div class="form-radio">
                        <div class="form-check-inline">
                            <input class="form-check-input" value="L" type="radio" name="jenkel" {{ old('jenkel', @$siswa->jenkel) == 'L' ? 'checked' : '' }}>
                            <label class="form-check-label">L</label>
                        </div>
                        <div class="form-check-inline mb-3">
                            <input class="form-check-input" value="P" type="radio" name="jenkel" {{ old('jenkel', @$siswa->jenkel) == 'P' ? 'checked' : '' }}>
                            <label class="form-check-label">P</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <select name="goldar" class="form-select">
                        <option value="">- Pilih Golongan Darah -</option>
                        <option value="A" {{ old('goldar', @$siswa->goldar) == 'A' ? 'selected' : ''}}>A</option>
                        <option value="B" {{ old('goldar', @$siswa->goldar) == 'B' ? 'selected' : ''}}>B</option>
                        <option value="AB" {{ old('goldar', @$siswa->goldar) == 'AB' ? 'selected' : ''}}>AB</option>
                        <option value="O" {{ old('goldar', @$siswa->goldar) == 'O' ? 'selected' : ''}}>O</option>
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
