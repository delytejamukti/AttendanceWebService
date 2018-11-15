@extends('layouts.main')

@section('title')
    Jadwal - Edit Jadwal
@endsection

@section('contents')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">Edit Jadwal</h1>
                <hr class="col-md-12">
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #013880;color: white;">
                <i class="fa fa-user fa-fw"></i><b>Edit Jadwal</b>
            </div>
            <div class="panel-body border border-primary">
            {!! Form::open(['action' => 'JadwalController@edit_submit', 'method'=>'PUT']) !!}
                <div class="form-group">
                    {{Form::text('id', $data->id, ['hidden'])}}
                    {{Form::label('dosen_nip','Dosen', ['class' => 'control-label col-sm-2'])}}
                    <div class="col-sm-10">
                        {{Form::select('dosen_nip', $dosen, $data->dosen_nip, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('mk_kode','Kode Mata Kuliah', ['class' => 'control-label col-sm-2'])}}
                    <div class="col-sm-10">
                        {{Form::select('mk_kode', $mata_kuliah, $data->mk_kode, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('kelas','Kelas', ['class' => 'control-label col-sm-2'])}}
                    <div class="col-sm-10">
                        {{Form::text('kelas', $data->kelas, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('hari','Hari', ['class' => 'control-label col-sm-2'])}}
                    <div class="col-sm-10">
                        {{Form::text('hari', $data->hari, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('tahun_ajaran','Tahun Ajaran', ['class' => 'control-label col-sm-2'])}}
                    <div class="col-sm-10">
                        {{Form::text('tahun_ajaran', $data->tahun_ajaran, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection