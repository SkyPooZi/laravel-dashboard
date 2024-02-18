@extends('layouts.partial.dashboard')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Class Dashboard</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
  </div>
</div>

<a style="align-item: center; margin-bottom: 10px;" type="button" class="btn btn-primary" href="/dashboard/kelas/create">Add New
  Kelas</a>
@if(session('success'))
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="check-circle-fill" viewBox="0 0 16 16">
    <path
      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
  </symbol>
</svg>
<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:" width="20" height="20">
    <use xlink:href="#check-circle-fill" />
  </svg>
  <div>
    {{ session('success') }}
  </div>
</div>
@endif
<div style="display: flex; align-item: center; justify-content: center;">
  <table class="table table-bordered table-dark table-striped" style="text-align: center;">
    <thead>
      <th>No</th>
      <th>Kelas</th>
      <th>Action</th>
    </thead>
    <tbody>
      @php
      $no = 1;
      @endphp
      @foreach($kelass as $kelas)
      <tr>
        <th>{{ $no++ }}</th>
        <th>{{ $kelas->kelas }}</th>
        <td>
          <a type="button" class="btn btn-primary" href="/dashboard/kelas/detail/{{ $kelas->id }}">Detail</a>
          <a type="button" class="btn btn-warning" href="/dashboard/kelas/edit/{{ $kelas->id }}">Edit</a>
          <form action="/dashboard/kelas/delete/{{ $kelas->id }}" method="post" class="d-inline"
            onsubmit="return confirmDelete()">
            @method('delete')
            @csrf
            <button class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<script>
  function confirmDelete() {
    return confirm('Apakah anda yakin ingin menghapus data {{$kelas->kelas}} ?');
  }
</script>
@endsection