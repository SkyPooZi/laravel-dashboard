@extends('layouts.main')

@section('container')
    <h1>Ini adalah halaman about</h1>
    <table class="table table-bordered" style="text-align: center; width: 900px;">
        <thead>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Foto</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $name }}</td>
                <td>{{ $kelas }}</td>
                <td><img src="{{ $foto }}" alt="foto" width="300"></td>
            </tr>
        </tbody>
    </table>
@endsection