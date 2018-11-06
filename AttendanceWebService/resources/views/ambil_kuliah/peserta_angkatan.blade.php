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


<p id="list" style="background-color: #4C6FF0; color: white; padding: 7px 0px 7px 7px; font-size: 22pt">Angkatan {{$angkatan}}</p>
<table id="list">
	<tr>
		<th>No.</th>
		<th>NRP</th>
		<th>Nama</th>
		<th>Angkatan</th>
		<th>Aksi</th>
	</tr>
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
			{!! Form::submit('tambah', ['class' => 'btn btn-success']) !!}
			{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</table>

