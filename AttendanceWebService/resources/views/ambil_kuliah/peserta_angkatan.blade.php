Angkatan {{$angkatan}}
<table>
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
			{!! Form::submit('tambah') !!}
			{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</table>

