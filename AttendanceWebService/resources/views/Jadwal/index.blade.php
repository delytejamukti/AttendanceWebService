@extends('layouts.main')

@section('title')
    Jadwal
@endsection

@section('contents')
    <h2>Jadwal Kuliah</h2>
    <a href="/jadwal/create">
        <button>tambah</button>
    </a>
    <br></br>
    <table border="1">
        <thead>
            <tr>
                <th>Dosen</th>
                <th>Mata Kuliah</th>
                <th>Hari</th>
                <th>Tahun Ajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
            <tr>
                <td>{{$row->nama_dosen}}</td>
                <td>{{$row->nama_mk}}</td>
                <td>{{$row->hari}}</td>
                <td>{{$row->tahun_ajaran}}</td>
                <td>
                    {{ Form::open(['route' => ['jadwal.delete', $row->id], 'method' => 'delete']) }}
                        <a href="/jadwal/edit/{{$row->id}}">
                            <button type="button">edit</button>
                        </a>
                        <button type="submit">hapus</button>
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection