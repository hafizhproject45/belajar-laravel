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

<h1 class="text-center p-4"><b>Form Guru</b></h1>
<div class="container d-flex justify-content-center">
    <div class="card bg-secondary  text-center p-md-3 " style="width: 20rem;">
        <div class="card-body d-flex justify-content-center">
            <form action="{{ url('guru', @$guru->id) }}" method="POST">
                @csrf
                @if(!empty($guru))
                @method('PATCH')
                @endif

                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('nip', @$guru->nip) }}" class="form-control" placeholder="NIP" name="nip">
                    <label>NIP</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('nama_guru', @$guru->nama_guru) }}" class="form-control" placeholder="Nama Guru" name="nama_guru" maxlength="100">
                    <label>Nama Guru</label>
                </div>
                <div class="form-radio text-bg-secondary ">
                    <label>Jenis Kelamin</label>
                    <div class="form-radio">
                        <div class="form-check-inline">
                            <input class="form-check-input" value="L" type="radio" name="jenkel" {{ old('jenkel', @$guru->jenkel) == 'L' ? 'checked' : '' }}>
                            <label class="form-check-label">L</label>
                        </div>
                        <div class="form-check-inline mb-3">
                            <input class="form-check-input" value="P" type="radio" name="jenkel" {{ old('jenkel', @$guru->jenkel) == 'P' ? 'checked' : '' }}>
                            <label class="form-check-label">P</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" value="{{ old('alamat', @$guru->alamat) }}" class="form-control" placeholder="Alamat" name="alamat">
                    <label>Alamat</label>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
