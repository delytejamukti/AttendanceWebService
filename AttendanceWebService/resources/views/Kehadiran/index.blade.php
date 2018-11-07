@extends('layouts.main')

@section('title')
    Kehadiran
@endsection

@section('contents')
	<table id="list">
		<thead>
			<tr>
				<th>No.</th>
				<th>NRP</th>
				<th>Nama Mahasiswa</th>
				<th>Mata Kuliah</th>
				<th>Tanggal</th>
				<th>Kehadiran</th>
				<th>Pertemuan ke-</th>
				<th>Status Kelas</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@if($kehadiran!=null)
				@foreach($kehadiran as $key=>$hadir)
					@php
						$ambilmk=App\AmbilKuliah::find($hadir->ambil_mk_id);
						$mhs=App\Mahasiswa::where('nrp',$ambilmk->nrp)->first();
						$jadwal=App\Jadwal::find($ambilmk->jadwal_id);
						$mk=App\MataKuliah::where('kode_mk',$jadwal->mk_kode)->first();
					@endphp
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$mhs->nrp}}</td>
						<td>{{$mhs->nama_mhs}}</td>
						<td>{{$mk->nama_mk}}</td>
						<td>{{$hadir->tanggal}}</td>
						<td>
							@if($hadir->hadir==0)
								Absen
							@else
								Masuk
							@endif
						</td>
						<td>{{$hadir->pertemuan_ke}}</td>
						<td>
							@if($hadir->default==0)
								Tetap
							@else
								Pengganti
							@endif
						</td>
						<td>
							@if($hadir->hadir==0)
								<button class="btn btn-info">Edit Status</button>
							@else
								<button class="btn btn-info">Edit Status</button>
							@endif
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
@endsection
@section('moreJS')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script>
        $(document).ready(function(){
            $('#list').DataTable({
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