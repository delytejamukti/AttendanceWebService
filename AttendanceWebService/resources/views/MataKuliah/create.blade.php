@extends('layouts.main')

@section('title')
    Mata Kuliah
@endsection

@section('contents')
    <h2>Tambah Mata Kuliah</h2>
    <div>
        {!! Form::open(['action' => 'MKController@create_submit', 'method'=>'POST']) !!}
    
        <table>
                <tr>
                    <td>
                        {{Form::label('kode_mk','Kode Mata Kuliah')}}
                    </td>
                    <td>
                        {{Form::text('kode_mk', '')}}
                    </td>
                </tr>            
                <tr>
                    <td>
                        {{Form::label('nama_mk','Nama Mata Kuliah')}}
                    </td>
                    <td>
                        {{Form::text('nama_mk', '')}}
                    </td>
                </tr>
            </table>
        {!! Form::submit('Simpan') !!}
    </div>
@endsection