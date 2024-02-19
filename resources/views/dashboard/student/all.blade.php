@extends('layouts.partial.dashboard')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Student Dashboard</h1>
</div>

<div class="row">
  <div class="col">
    <a style="align-item: center; margin-bottom: 10px;" type="button" class="btn btn-primary"
      href="/dashboard/student/create">Add New Student</a>
  </div>
  <div class="col-md-3">
    <div class="mb-3">
      <select class="form-select" name="kelas_id" id="kelas_id">
        <option value="" selected>All Class</option>
        @foreach ($kelass as $kelas)
        <option name="kelas_id" value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-md-6">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search..." id="searchInput" aria-label="Recipient's username"
        aria-describedby="button-addon2">
      <button class="btn btn-primary" type="button" id="searchButton">Search</button>
    </div>
  </div>
</div>

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
      <th>NIS</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Action</th>
    </thead>
    <tbody>
      @php
      $no = ($students->currentPage() - 1) * $students->perPage() + 1;
      @endphp
      @foreach($students as $student)
      <tr>
        <th>{{ $no++ }}</th>
        <th>{{ $student->nis }}</th>
        <td>{{ $student->nama }}</td>
        <td>{{ $student->kelas->kelas }}</td>
        <td>
          <a type="button" class="btn btn-primary" href="/dashboard/student/detail/{{ $student->id }}">Detail</a>
          <a type="button" class="btn btn-warning" href="/dashboard/student/edit/{{ $student->id}}">Edit</a>
          <form action="/dashboard/student/delete/{{ $student->id }}" method="post" class="d-inline"
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
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item {{ $students->previousPageUrl() ? '' : 'disabled' }}">
      <a class="page-link" href="{{ $students->previousPageUrl() }}" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    @foreach ($students->getUrlRange(1, $students->lastPage()) as $page => $url)
    <li class="page-item {{ $page == $students->currentPage() ? 'active' : '' }}">
      <a class="page-link" href="{{ $url }}">{{ $page }}</a>
    </li>
    @endforeach
    <li class="page-item">
      <a class="page-link {{ $students->nextPageUrl() ? '' : 'disabled' }}" href="{{ $students->nextPageUrl() }}"
        aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
<script>
  var url = new URL(window.location.href);
  $(document).ready(function () {
    $('#searchButton').click(function () {
      var search = $('#searchInput').val();
      url.searchParams.set('search', search.trim());
      window.location.href = url.toString();
    });

    $('#kelas_id').change(function () {
      var selectedKelas = $(this).val();
      if (selectedKelas !== '') {
        url.searchParams.set('kelas_id', selectedKelas);
      } else {
        url.searchParams.delete('kelas_id');
      }
      window.location.href = url.toString();
    });

    var searchParam = url.searchParams.get('search');
    if (searchParam) {
      $('#searchInput').val(searchParam);
    }

    var kelasIdParam = url.searchParams.get('kelas_id');
    if (kelasIdParam) {
      $('#kelas_id').val(kelasIdParam);
    }
  });
  function confirmDelete() {
    
  }
</script>

@endsection