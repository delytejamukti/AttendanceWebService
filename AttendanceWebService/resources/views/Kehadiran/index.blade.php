@extends('layouts.main')

@section('title')
    Kehadiran
@endsection

@section('contents')
    <h2>Tambah Kehadiran Kelas</h2>
    <form method="POST" action="{{url('/kehadiran/create')}}">
        {{csrf_field()}}
        <h3 class="block-title">Cari Jadwal</h3>
        <select class="js-mk form-control" style="width: 92%;" name="mk" data-placeholder="Cari Jadwal" required>
            {{-- @foreach ($ambilMK as $mk)
                @php
                    $mhs=App\Mahasiswa::where('nrp',$mk->nrp)->first();
                    $jadwal=App\Jadwal::find($mk->jadwal_id);
                    $mk=App\MataKuliah::where('kode_mk',$jadwal->mk_kode)->first();
                @endphp
                <option name="ambilmk" value="{{$mk->id}}">{{$mhs->nrp}} | {{$mhs->nama_mhs}} | {{$mk->nama_mk}}</option>
            @endforeach --}}
        </select>

		<div class="mt-2"></div>
        <h3 class="block-title">Tanggal Jadwal</h3>
        <input type="date" name="tanggal" required class="form-control" required>
        <h3 class="block-title">Pertemuan Ke-</h3>
        <input type="number" name="pertemuan" required class="form-control" min="1" max="16" required>
        <br>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/versicetak" type="submit" class="btn btn-light" style="float: right">Versi Cetak</a>
    </form>
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
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
	<script>
        $(document).ready(function(){
            $('#list').DataTable({
                "autoWidth": true,
                "ordering": false,
            });
        });
        $(document).ready(function() {
		    $('.js-mk').select2({
                ajax: {
                    url: '{!! url('/mata-kuliah/search') !!}',
                    dataType: 'json',
                    delay: 300,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.kode_mk+"-"+item.nama_mk+" "+item.hari,
                                    id: item.id_jadwal
                                }
                            })
                        };
                    },
                    cache: true
            	}
            });
		    $('.js-mahasiswa').select2({
                ajax: {
                    url: '{!! url('/mahasiswa/search') !!}',
                    dataType: 'json',
                    delay: 300,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.nrp+"-"+item.nama_mhs,
                                    id: item.nrp
                                }
                            })
                        };
                    }
            	}
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
