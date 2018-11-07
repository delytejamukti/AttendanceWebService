@extends('layouts.main')

@section('title')
    Ambil Kuliah
@endsection

@section('contents')

<strong style="font-size: 14pt"><center>Tabel Peserta Kelas {{$nama_mk}}</center></strong>
<table id='list'>
<thead>
	<tr>
		<th>No.</th>
		<th>NRP</th>
		<th>Nama</th>
		<th>Angkatan</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
	@foreach($ambil as $p)
	<tr>
		<td>{{$c++}}</td>
		<td>{{$p->nrp}}</td>
		<td>{{$p->nama_mhs}}</td>
		<td>{{$p->angkatan}}</td>
		<td>
			{!! Form::open(['action' => 'AmbilKuliahController@delete', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
			<input type="hidden" name="id" value="{{$p->id}}">
			{!! Form::submit('Hapus',['class' => 'btn btn-danger']) !!}
			{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</tbody>
</table>

<div style="padding: 40px 0 0 0">
	<strong style="font-size: 14pt">Tambah Siswa</strong>
	{!! Form::open(['action' => 'AmbilKuliahController@angkatan', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
	{!! Form::label('angkatan', 'Angkatan', ['style' => 'font-size:12pt']) !!}
	{!! Form::select('angkatan', [2013 => 2013, 2014 => 2014, 2015 => 2015, 2016 => 2016, 2017 => 2017, 2018 => 2018, 2019 => 2019])!!}
	<input type="hidden" name="jadwal" value="{{$jadwal}}"> 
	{!! Form::submit('Pilih',['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
</div>

@endsection

@section('moreJS')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script>
        $(document).ready(function(){
            $('table').DataTable({
                "autoWidth": true,
                "ordering": false,
            });
        });
    </script>
@endsection

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

#list th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #3385ff;
    color: white;
}
</style>