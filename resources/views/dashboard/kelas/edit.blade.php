@extends('layouts.partial.dashboard')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Student Data</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<form action="/dashboard/kelas/update/ {{ $kelas->id }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ old('kelas', $kelas->kelas) }}" placeholder="Kelas" aria-label="kelas" aria-describedby="basic-addon1">
        </div>
        <button type="submit" class="btn btn-primary">Edit Student</button>
    </form>

@endsection