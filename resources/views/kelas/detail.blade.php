@extends('layouts.main')

@section('container')
<table class="table table-bordered table-dark table-striped" style="text-align: center; width: 1000px;">
    <thead >
        <th>Kelas</th>
        <th>Action</th>
    </thead>
    <tbody>
        <tr>
            <td>{{ $kelas->kelas }}</td>
            <td>
                <a type="button" class="btn btn-primary" href="/kelas/all">Back</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection