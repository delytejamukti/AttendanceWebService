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

#list tr:nth-child(even){background-color: #d6d6db;}

#list tr:hover {background-color: #66b3ff;}

#list th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #3385ff;
    color: white;
}
</style>

@extends('layouts.main')

@section('title')
    Ambil Kuliah
@endsection

@section('contents')

<table id="list">
	<tr>
		<th>No.</th>
		<th>Mata Kuliah</th>
		<th>Dosen Pengajar</th>
		<th>Hari</th>
		<th>Tahun Ajaran</th>
		<th>Aksi</th>
	</tr>
	@foreach($j as $p)
	<tr>
		<td>{{$c++}}</td>
		<td>{{$p->nama_mk}}</td>
		<td>{{$p->nama_dosen}}</td>
		<td>{{$p->hari}}</td>
		<td><center>{{$p->tahun_ajaran}}</center></td>
		<td>
			{!! Form::open(['action' => 'AmbilKuliahController@peserta', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
			<input type="hidden" name="nama_mk" value="{{$p->nama_mk}}">
			<input type="hidden" name="jadwal" value="{{$p->id}}">	
			<center>{!! Form::submit('Peserta',['class' => 'btn btn-primary']) !!}</center>
			{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</table>

@endsection