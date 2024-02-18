@extends('layouts.partial.dashboard')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New Student</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
</div>

<form action="/dashboard/student/add" method="post">
    @csrf
    <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="number" class="form-control" id="nis" name="nis" value="{{ old('nis') }}" placeholder="NIS"
            aria-label="nis" aria-describedby="basic-addon1" required>
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama"
            aria-label="nama" aria-describedby="basic-addon1" required>
    </div>
    <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
            value="{{ old('tanggal_lahir') }}" placeholder="Tanggal Lahir" aria-label="tanggal_lahir Lahir"
            aria-describedby="basic-addon1" required>
    </div>
    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <!-- <input type="text" class="form-control" id="kelas" name="kelas" value="{{ old('kelas') }}" placeholder="Kelas" aria-label="kelas" aria-describedby="basic-addon1" required> -->
        <select class="form-select" name="kelas_id" id="">
            @foreach ($kelass as $kelas)
            <option name="kelas_id" value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}"
            placeholder="Alamat" aria-label="alamat" aria-describedby="basic-addon1" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Student</button>
</form>

@endsection