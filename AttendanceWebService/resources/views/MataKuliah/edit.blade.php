@extends('layouts.main')

@section('title')
    Mata Kuliah
@endsection

@section('contents')
    <h2>Edit Mata Kuliah</h2>
    <div>
        {!! Form::open(['action' => 'MKController@edit_submit', 'method'=>'PUT']) !!}
        <table>
            <tr>
                <td>
                    {{Form::label('kode_mk','Kode Mata Kuliah')}}
                </td>
                <td>
                    {{Form::text('mk_kode', $data->kode_mk, ['disabled'])}}
                    {{Form::text('kode_mk', $data->kode_mk, ['hidden'])}}
                </td>
            </tr>            
            <tr>
                <td>
                    {{Form::label('nama_mk','Nama Mata Kuliah')}}
                </td>
                <td>
                    {{Form::text('nama_mk', $data->nama_mk)}}
                </td>
            </tr>
        </table>
        {!! Form::submit('Simpan') !!}
    </div>
@endsection