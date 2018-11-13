@extends('layouts.main')

@section('title')
    Jadwal
@endsection

@section('contents')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">Data Jadwal</h1>
            <hr class="col-md-12">
            <a href="{{route('jadwal.add')}}">
                <button type="button" class="btn btn-primary" name="button" style="margin-bottom: 20px">Tambah Jadwal</button>
            </a>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #013880;color: white;">
                <i class="fa fa-user fa-fw"></i><b>Jadwal
            </b>
        </div>
        <div class="panel-body">
            <div class="table table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Dosen</th>
                            <th>Mata Kuliah</th>
                            <th>Kelas</th>
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
                            <td>{{$row->kelas}}</td>
                            <td>{{$row->hari}}</td>
                            <td>{{$row->tahun_ajaran}}</td>
                            <td>
                                {{ Form::open(['route' => ['jadwal.delete', $row->id], 'method' => 'delete']) }}
                                    <a href="/jadwal/edit/{{$row->id}}">
                                        <button type="button" class="btn btn-primary">edit</button>
                                    </a>
                                    <button type="submit" class="btn btn-danger">hapus</button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection