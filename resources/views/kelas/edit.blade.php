@extends('layouts.main')

@section('container')
    <h2>Edit Data</h2>
    <form action="/kelas/update/ {{ $kelas->id }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ old('kelas', $kelas->kelas) }}" placeholder="Kelas" aria-label="kelas" aria-describedby="basic-addon1">
        </div>
        <button type="submit" class="btn btn-primary">Edit Student</button>
    </form>
@endsection