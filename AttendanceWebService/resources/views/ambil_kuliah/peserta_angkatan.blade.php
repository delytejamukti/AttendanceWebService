@extends('layouts.main')

@section('title')
    Ambil Kuliah
@endsection

@section('contents')

<strong style="font-size: 14pt"><center>Angkatan {{$angkatan}}</center></strong>
<table id="list">
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
	@foreach($mhs as $p)
	<tr>
		<td>{{$c++}}</td>
		<td>{{$p->nrp}}</td>
		<td>{{$p->nama_mhs}}</td>
		<td>{{$p->angkatan}}</td>
		<td>
			{!! Form::open(['action' => 'AmbilKuliahController@tambah', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
			<input type="hidden" name="mhs_nrp" value="{{$p->nrp}}">
			<input type="hidden" name="jadwal" value="{{$jadwal}}">
			<center>{!! Form::submit('Tambah',['class' => 'btn btn-primary']) !!}</center>
			{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</tbody>
</table>

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

#list tr:hover {background-color: #66b3ff;}

#list th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #3385ff;
    color: white;
}
</style>

