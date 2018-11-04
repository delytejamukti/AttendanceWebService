Tabel Peserta Kelas {{$nama_mk}}
<table>
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
			{!! Form::submit('Hapus') !!}
			{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</table>

Tambah Siswa
{!! Form::open(['action' => 'AmbilKuliahController@angkatan', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
{!! Form::label('angkatan', 'Angkatan') !!}
{!! Form::select('angkatan', [2013 => 2013, 2014 => 2014, 2015 => 2015, 2016 => 2016, 2017 => 2017, 2018 => 2018, 2019 => 2019])!!}
<input type="hidden" name="jadwal" value="{{$jadwal}}"> 
{!! Form::submit('oke') !!}
{!! Form::close() !!}

