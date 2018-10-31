{{-- @extends('layouts.main')

@section('title')
    Jadwal
@endsection

@section('contents') --}}
    <h2>Edit Jadwal</h2>
    <div>
        {!! Form::open(['action' => 'JadwalController@edit_submit', 'method'=>'PUT']) !!}
            {{Form::text('id', $data->id, ['hidden'])}}
            {{Form::label('dosen_nip','Dosen')}}
            {{Form::select('dosen_nip', $dosen, $data->dosen_nip)}}
            <br>
            {{Form::label('mk_kode','Kode Mata Kuliah')}}
            {{Form::select('mk_kode', $mata_kuliah, $data->mk_kode)}}
            <br>    
            {{Form::label('hari','Hari')}}
            {{Form::text('hari', $data->hari)}}
            <br>
            {{Form::label('tahun_ajaran','Tahun Ajaran')}}
            {{Form::text('tahun_ajaran', $data->tahun_ajaran)}}
        {!! Form::submit('Kirim') !!}
    </div>
{{-- @endsection --}}