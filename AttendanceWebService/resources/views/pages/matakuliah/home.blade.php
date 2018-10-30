@extends('layouts.main')

@section('title')
    Mata Kuliah
@endsection

@section('contents')
    <table border="1">
        <thead>
            <tr>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
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