@extends('layouts.main')

@section('title')
    Kehadiran
@endsection

@section('contents')
    <h2>Tambah Kehadiran Kelas</h2>
    <form method="POST" action="{{url('/kehadiran/create')}}">
        {{csrf_field()}}
        @php
            $ambilMK = \App\AmbilKuliah::all();
        @endphp
        <h3 class="block-title">Cari Jadwal</h3>
        <select class="js-mk form-control" style="width: 92%;" name="mk" data-placeholder="Cari Jadwal">
            @foreach ($ambilMK as $mk)
                @php
                    $mhs=App\Mahasiswa::where('nrp',$mk->nrp)->first();
                    $jadwal=App\Jadwal::find($mk->jadwal_id);
                    $mk=App\MataKuliah::where('kode_mk',$jadwal->mk_kode)->first();
                @endphp
                <option name="ambilmk" value="{{$mk->id}}">{{$mhs->nrp}} | {{$mhs->nama_mhs}} | {{$mk->nama_mk}}</option>
            @endforeach
        </select>
		<div class="mt-2"></div>
        {{Form::label('hari','Hari')}}
        {{Form::text('hari', '')}}

        {{Form::label('tahun_ajaran','Tahun Ajaran')}}
        {{Form::text('tahun_ajaran', '')}}
        <br>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>

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
                <th>Edit Catatan</th>
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
                        <td><a href="{{url('/kehadiran/edit/'.$hadir->id)}}">	<button class="btn btn-primary">Edit Catatan</button></a></td>
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
