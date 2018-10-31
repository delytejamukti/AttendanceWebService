{{-- @extends('layouts.main')

@section('title')
    Mata Kuliah
@endsection

@section('contents') --}}
    <h2>Edit Mata Kuliah</h2>
    <div>
        {!! Form::open(['action' => 'MKController@edit_submit', 'method'=>'PUT']) !!}
            {{Form::label('kode_mk','Kode Mata Kuliah')}}
            {{Form::text('mk_kode', $data->kode_mk, ['disabled'])}}
            {{Form::text('kode_mk', $data->kode_mk, ['hidden'])}}
            <br>
            {{Form::label('nama_mk','Nama Mata Kuliah')}}
            {{Form::text('nama_mk', $data->nama_mk)}}
        {!! Form::submit('Kirim') !!}
    </div>
{{-- @endsection --}}