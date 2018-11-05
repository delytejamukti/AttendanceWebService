<table>
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
			{!! Form::submit('Peserta') !!}
			{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</table>