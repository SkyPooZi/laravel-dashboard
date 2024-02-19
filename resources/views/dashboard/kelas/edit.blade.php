@extends('layouts.partial.dashboard')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Class Data</h1>
</div>

<form action="/dashboard/kelas/update/ {{ $kelas->id }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="kelas" class="form-label">Class</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ old('kelas', $kelas->kelas) }}" placeholder="Class" aria-label="kelas" aria-describedby="basic-addon1">
        </div>
        <button type="submit" class="btn btn-primary">Edit Class</button>
    </form>

@endsection