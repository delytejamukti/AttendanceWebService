{{--@extends('layouts.main')--}}
        <!doctype html>
    <head>
    <title>Versi Cetak</title>
</head>

<body>
<br>
<table id="list">
    <thead>
    <tr>
        <th>No.</th>
        <th>NRP</th>
        <th>Nama Mahasiswa</th>
        <th>Mata Kuliah</th>
        <th>Tanggal</th>
        <th>Kehadiran</th>
        <th>Catatan</th>
        <th>Pertemuan ke-</th>
        <th>Status Kelas</th>
    </tr>
    </thead>
    <tbody>
    @if($kehadiran!=null)
        @foreach($kehadiran as $key=>$hadir)
            @php
                $ambilmk=App\AmbilKuliah::find($hadir->ambil_mk_id);
                $mhs=App\Mahasiswa::where('nrp',$ambilmk->nrp)->first();
                $jadwal=App\Jadwal::find($ambilmk->jadwal_id);
                $mk=App\MataKuliah::where('kode_mk',$jadwal->mk_kode)->first();
            @endphp
            <tr>
                <td>{{$key+1}}</td>
                @if (!empty($mhs))
                    <td>{{$mhs->nrp}}</td>
                    <td>{{$mhs->nama_mhs}}</td>
                @else
                    <td>-</td>
                    <td>-</td>
                @endif

                <td>{{$mk->nama_mk}}</td>
                <td>{{$hadir->tanggal}}</td>
                <td>
                    @if($hadir->hadir==0)
                        <span class="btn-danger">Absen</span>
                    @else
                        <span class="btn-success">Masuk</span>
                    @endif
                </td>
                <td>{{$hadir->catatan}}</td>
                <td>{{$hadir->pertemuan_ke}}</td>
                <td>
                    @if($hadir->default==0)
                        Tetap
                    @else
                        Pengganti
                    @endif
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
</body>

<style>
    #list {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #list td, #list th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #list tr:nth-child(even){background-color: #ffffff;}

    #list tr:hover {background-color: #ffffff;}

    #list th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #ffffff;
        color: black;
    }
</style>
