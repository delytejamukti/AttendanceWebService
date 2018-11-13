@extends('layouts.main')

@section('title')
    Jadwal - Menambah Jadwal
@endsection

@section('contents')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">Menambah Jadwal</h1>
                <hr class="col-md-12">
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #013880;color: white;">
                <i class="fa fa-user fa-fw"></i><b>Tambah Jadwal</b>
            </div>
            <div class="panel-body border border-primary">
            {!! Form::open(['action' => 'JadwalController@create_submit', 'method'=>'POST']) !!}
                <div class="form-group">
                    {{Form::label('dosen_nip','Dosen', ['class' => 'control-label col-sm-2'])}}
                    <div class="col-sm-10">
                        {{Form::select('dosen_nip', $dosen, '', ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('mk_kode','Kode Mata Kuliah', ['class' => 'control-label col-sm-2'])}}
                    <div class="col-sm-10">
                        {{Form::select('mk_kode', $mata_kuliah, '', ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('kelas','Kelas', ['class' => 'control-label col-sm-2'])}}
                    <div class="col-sm-10">
                        {{Form::text('kelas', '', ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('hari','Hari', ['class' => 'control-label col-sm-2'])}}
                    <div class="col-sm-10">
                        {{Form::text('hari', '', ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('tahun_ajaran','Tahun Ajaran', ['class' => 'control-label col-sm-2'])}}
                    <div class="col-sm-10">
                        {{Form::text('tahun_ajaran', '', ['class' => 'form-control'])}}
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