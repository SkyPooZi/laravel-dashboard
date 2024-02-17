@extends('layouts.main')

@section('container')
    <h2>Tambah Data Baru</h2>
    <form action="/kelas/add" method="post">
        @csrf
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ old('kelas') }}" placeholder="Kelas" aria-label="kelas" aria-describedby="basic-addon1" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Kelas</button>
    </form>
@endsection