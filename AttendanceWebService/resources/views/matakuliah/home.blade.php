@extends('layouts.main')

@section('title')
    Attendance Web Service
@endsection

@section('contents')
    <table border="1">
        <thead>
            <tr>
                <th>Kode MK</th>
                <th>Nama MK</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
            <tr>
                <td>{{$row->kode_mk}}</td>
                <td>{{$row->nama_mk}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection