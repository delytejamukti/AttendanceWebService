@extends('layouts.main')

@section('title')
    Kehadiran
@endsection

@section('contents')
    <h2>Kehadiran Kelas</h2>
    <br>
	<table id="list">
		<thead>
			<tr>
				<th>No.</th>
				<th>NRP</th>
				<th>Nama Mahasiswa</th>
				<th>Mata Kuliah</th>
				<th>Tanggal</th>
                <th>Kehadiran</th>
                <th>Catatan</th>
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
						@if (!empty($mhs))
                            <td>{{$mhs->nrp}}</td>
                            <td>{{$mhs->nama_mhs}}</td>
                        @else
                            <td>-</td>
                            <td>-</td>
                        @endif

						<td>{{$mk->nama_mk}}</td>
						<td>{{$hadir->tanggal}}</td>
						<td>
							@if($hadir->hadir==0)
								<span class="btn-danger">Absen</span>
							@else
								<span class="btn-success">Masuk</span>
							@endif
                        </td>
                        <td>{{$hadir->catatan}}</td>
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
								<a href="{{url('/kehadiran/edit/kehadiran/'.$hadir->id)}}">	<button class="btn btn-success">Hadir</button></a>
							@else
								<a href="{{url('/kehadiran/edit/kehadiran/'.$hadir->id)}}">	<button class="btn btn-danger">Tidak Hadir</button></a>
							@endif

                        </td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
@endsection
@section('moreJS')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
	<script>
        $(document).ready(function(){
            $('#list').DataTable({
                "autoWidth": true,
                "ordering": false,
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": false,
                "bInfo": false,
                "bAutoWidth": false
            });
        });

        
        $(document).ready(function(){
            window.print();
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