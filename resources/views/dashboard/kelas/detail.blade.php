@extends('layouts.partial.dashboard')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Class details</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<table class="table table-bordered table-dark table-striped" style="text-align: center; width: 1000px;">
    <thead >
        <th>Kelas</th>
        <th>Action</th>
    </thead>
    <tbody>
        <tr>
            <td>{{ $kelas->kelas }}</td>
            <td>
                <a type="button" class="btn btn-primary" href="/dashboard/kelas/all">Back</a>
            </td>
        </tr>
    </tbody>
</table>

@endsection