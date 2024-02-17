@extends('layouts.main')

@section('container')
<table class="table table-bordered table-dark table-striped" style="text-align: center; width: 1000px;">
    <thead >
        <th>NIS</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Kelas</th>
        <th>Alamat</th>
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
                <a type="button" class="btn btn-primary" href="/student/all">Back</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection