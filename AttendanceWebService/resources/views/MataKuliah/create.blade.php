@extends('layouts.main')

@section('title')
    Mata Kuliah - Menambah Mata Kuliah
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
                {!! Form::open(['action' => 'MKController@create_submit', 'method'=>'POST']) !!}
                <div class="form-group">
                    {{Form::label('kode_mk','Kode Mata Kuliah', ['class' => 'control-label col-sm-2'])}}
                    <div class="col-sm-10">
                        {{Form::text('kode_mk', '', ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('nama_mk','Nama Mata Kuliah', ['class' => 'control-label col-sm-2'])}}
                    <div class="col-sm-10">
                        {{Form::text('nama_mk', '', ['class' => 'form-control'])}}
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