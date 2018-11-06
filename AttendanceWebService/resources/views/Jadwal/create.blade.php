{{-- @extends('layouts.main')

@section('title')
    Jadwal
@endsection

@section('contents') --}}
    <h2>Tambah Jadwal</h2>
    <div>
        {!! Form::open(['action' => 'JadwalController@create_submit', 'method'=>'POST']) !!}
            {{Form::label('dosen_nip','Dosen')}}
            {{Form::select('dosen_nip', $dosen)}}
            <br>
            {{Form::label('mk_kode','Kode Mata Kuliah')}}
            {{Form::select('mk_kode', $mata_kuliah)}}
            <br>
            {{Form::label('hari','Hari')}}
            {{Form::text('hari', '')}}
            <br>
            {{Form::label('tahun_ajaran','Tahun Ajaran')}}
            {{Form::text('tahun_ajaran', '')}}
        {!! Form::submit('Kirim') !!}
    </div>
{{-- @endsection --}}