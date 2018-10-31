@extends('layouts.main')

@section('title')
    Mata Kuliah
@endsection

@section('contents')
    <h2>Mata Kuliah</h2>
    <a href="/mata-kuliah/create">
        <button>tambah</button>
    </a>
    <br></br>
    <table border="1">
        <thead>
            <tr>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
            <tr>
                <td>{{$row->kode_mk}}</td>
                <td>{{$row->nama_mk}}</td>
                <td>
                <a href="/mata-kuliah/edit/{{$row->kode_mk}}">
                    <button>edit</button>
                </a>
                <a href="/delete/{{$row->kode_mk}}">
                    <button>hapus</button>
                </a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection