@extends('layouts.main')

@section('container')
    <h2>Edit Data</h2>
    <form action="/student/update/ {{ $student->id }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="number" class="form-control" id="nis" name="nis" value="{{ old('nis', $student->nis) }}" placeholder="NIS" aria-label="nis" aria-describedby="basic-addon1" readonly>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $student->nama) }}" placeholder="Nama" aria-label="nama" aria-describedby="basic-addon1">
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}" placeholder="Tanggal Lahir" aria-label="tanggal_lahir Lahir" aria-describedby="basic-addon1">
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <!-- <input type="text" class="form-control" id="kelas" name="kelas" value="{{ old('kelas', $student->kelas) }}" placeholder="Kelas" aria-label="kelas" aria-describedby="basic-addon1"> -->
            <select class="form-select" name="kelas_id" id="">
                @foreach ($kelass as $kelas)
                    <option name="kelas_id" value="{{ $kelas->id }}" {{ $kelas->id == $student->kelas_id ? 'selected' : '' }}>{{ $kelas->kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $student->alamat) }}" placeholder="Alamat" aria-label="alamat" aria-describedby="basic-addon1">
        </div>
        <button type="submit" class="btn btn-primary">Edit Student</button>
    </form>
@endsection