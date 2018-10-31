@extends('layouts.main')

@section('title')
    Jadwal
@endsection

@section('contents')
    <h2>Jadwal Kuliah</h2>
    <button>tambah</button>
    <br></br>
    <table border="1">
        <thead>
            <tr>
                <th>Dosen</th>
                <th>Kode Mata Kuliah</th>
                <th>Hari</th>
                <th>Tahun Ajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
            <tr>
                <td>{{$row->dosen_nip}}</td>
                <td>{{$row->mk_kode}}</td>
                <td>{{$row->hari}}</td>
                <td>{{$row->tahun_ajaran}}</td>
                <td>
                    <button>edit</button>
                    <button>hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection