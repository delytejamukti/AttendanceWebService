<style>
#list {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#list td, #list th {
    border: 1px solid #ddd;
    padding: 8px;
}

#list tr:nth-child(even){background-color: #f2f2f2;}

#list tr:hover {background-color: #ddd;}

#list th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>

@extends('layouts.main')

@section('contents')

<p id="list" style="background-color: #4C6FF0; color: white; padding: 7px 0px 7px 7px; font-size: 22pt">Tabel Peserta Kelas {{$nama_mk}}</p>
<table id="list">
	<tr>
		<th>No.</th>
		<th>NRP</th>
		<th>Nama</th>
		<th>Angkatan</th>
		<th>Aksi</th>
	</tr>
	@foreach($ambil as $p)
	<tr>
		<td>{{$c++}}</td>
		<td>{{$p->nrp}}</td>
		<td>{{$p->nama_mhs}}</td>
		<td>{{$p->angkatan}}</td>
		<td>
			{!! Form::open(['action' => 'AmbilKuliahController@delete', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
			<input type="hidden" name="id" value="{{$p->id}}">
			{!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
			{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</table>
<div id="list">
Tambah Siswa
{!! Form::open(['action' => 'AmbilKuliahController@angkatan', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
{!! Form::label('angkatan', 'Angkatan') !!}
{!! Form::select('angkatan', [2013 => 2013, 2014 => 2014, 2015 => 2015, 2016 => 2016, 2017 => 2017, 2018 => 2018, 2019 => 2019])!!}
<input type="hidden" name="jadwal" value="{{$jadwal}}"> 
{!! Form::submit('pilih', ['class' => 'btn btn-info']) !!}
{!! Form::close() !!}
</div>


@endsection