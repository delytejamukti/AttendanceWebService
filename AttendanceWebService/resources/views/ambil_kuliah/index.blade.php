<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<tr>
		<th>No.</th>
		<th>Mata Kuliah</th>
		<th>Dosen Pengajar</th>
		<th>Hari</th>
		<th>Aksi</th>
	</tr>
	@foreach($j as $p)
	<tr>
		<td>{{$c++}}</td>
		<td>{{$p->nama_mk}}</td>
		<td>{{$p->nama_dosen}}</td>
		<td>{{$p->hari}}</td>
		<td>
			{!! Form::open(['action' => 'AmbilKuliahController@peserta', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
			<input type="hidden" name="jadwal" value="{{$p->id}}">
			{!! Form::submit('Peserta',['class'=>'btn btn-primary m-t-20 waves-black']) !!}
			{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</table>


</body>
</html>