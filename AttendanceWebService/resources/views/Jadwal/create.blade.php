@extends('layouts.main')

@section('title')
    Jadwal
@endsection

@section('contents')
    <h2>Tambah Jadwal</h2>
    <div>
        {!! Form::open(['action' => 'JadwalController@create_submit', 'method'=>'POST']) !!}
        <table>
            <tr>
                <td>
                    {{Form::label('dosen_nip','Dosen')}}
                </td>
                <td>
                    {{Form::select('dosen_nip', $dosen)}}
                </td>
            </tr>
            <tr>
                <td>
                    {{Form::label('mk_kode','Kode Mata Kuliah')}}
                </td>
                <td>
                    {{Form::select('mk_kode', $mata_kuliah)}}
                </td>
            </tr>
            <tr>    
                <td>
                    {{Form::label('hari','Hari')}}
                </td>
                <td>
                    {{Form::text('hari', '')}}
                </td>
            </tr>
            <tr>
                <td>
                    {{Form::label('tahun_ajaran','Tahun Ajaran')}}
                </td>
                <td>
                    {{Form::text('tahun_ajaran', '')}}
                </td>
            </tr>
        </table>
        {!! Form::submit('Simpan') !!}
    </div>
@endsection