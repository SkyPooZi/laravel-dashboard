@extends('layouts.partial.dashboard')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Student details</h1>
</div>

<table class="table table-bordered table-dark table-striped" style="text-align: center; width: 1000px;">
    <thead>
        <th>NIS</th>
        <th>Name</th>
        <th>Tanggal Lahir</th>
        <th>Class</th>
        <th>Address</th>
        <th>Action</th>
    </thead>
    <tbody>
        <tr>
            <td>{{ $student-> nis }}</td>
            <td>{{ $student-> nama }}</td>
            <td>{{ $student-> tanggal_lahir }}</td>
            <td>{{ $student-> kelas -> kelas }}</td>
            <td>{{ $student-> alamat }}</td>
            <td>
                <a type="button" class="btn btn-primary" href="/dashboard/student/all">Back</a>
            </td>
        </tr>
    </tbody>
</table>

@endsection