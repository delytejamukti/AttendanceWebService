@extends('layouts.main')

@section('title')
    Mata Kuliah
@endsection

@section('contents')
    <h2>Tambah Mata Kuliah</h2>
    <div>
        {!! Form::open(['action' => 'MKController@create_submit', 'method'=>'POST']) !!}
        {{Form::label('kode_mk','Kode Mata Kuliah')}}
        {{Form::text('kode_mk','')}}
        {{Form::label('nama_mk','Nama Mata Kuliah')}}
        {{Form::text('nama_mk','')}}
        {!! Form::submit('Kirim') !!}
    </div>
@endsection