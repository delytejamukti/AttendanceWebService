@extends('layouts.main')

@section('title')
    Jadwal
@endsection

@section('contents')
    <h2>Edit Jadwal</h2>
    <div>
        {!! Form::open(['action' => 'JadwalController@edit_submit', 'method'=>'PUT']) !!}
        <table>
            <tr>
                <td>
                    {{Form::text('id', $data->id, ['hidden'])}}
                    {{Form::label('dosen_nip','Dosen')}}
                </td>
                <td>
                    {{Form::select('dosen_nip', $dosen, $data->dosen_nip)}}
                </td>
            </tr>
            <tr>
                <td>
                    {{Form::label('mk_kode','Kode Mata Kuliah')}}
                </td>
                <td>
                    {{Form::select('mk_kode', $mata_kuliah, $data->mk_kode)}}
                </td>
            </tr>
            <tr>    
                <td>
                    {{Form::label('hari','Hari')}}
                </td>
                <td>
                    {{Form::text('hari', $data->hari)}}
                </td>
            </tr>
            <tr>
                <td>
                    {{Form::label('tahun_ajaran','Tahun Ajaran')}}
                </td>
                <td>
                    {{Form::text('tahun_ajaran', $data->tahun_ajaran)}}
                </td>
            </tr>
        </table>
        {!! Form::submit('Simpan') !!}
    </div>
@endsection