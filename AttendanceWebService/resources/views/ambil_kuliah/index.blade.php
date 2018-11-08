@extends('layouts.main')

@section('title')
    Ambil Kuliah
@endsection
@section('contents')
{{-- <button type="button" class="btn btn-alt-info" data-toggle="modal" data-target="#modal-normal">Tambah Peserta</button> --}}
<h2>Tambah Ambil Kuliah</h2>
<form method="POST" action="{{url('/ambil_kuliah/peserta/tambah')}}">
	<h3 class="block-title">Cari Jadwal</h3>
	{{csrf_field()}}
	<select class="js-mk form-control" style="width: 92%;" name="mk" data-placeholder="Cari Jadwal">
	</select>
	<h3 class="block-title">Cari Mahasiswa</h3>
	<select class="js-mahasiswa form-control" style="width: 92%;" name="mhs" data-placeholder="Cari Mahasiswa">
	</select>
	<button type="submit" class="btn btn-success">Simpan</button>
</form>

<br>
<br>
{{-- <div class="modal" id="modal-normal" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Tambah Peserta</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
	                <div class="form-group mb-15">
	                    <label for="side-overlay-profile-email">Mata Kuliah</label>
	                    <div class="input-group">
	                        <select class="js-mk form-control" style="width: 92%;" name="mk">

							</select>
	                        <div class="input-group-append">
	                            <span class="input-group-text">
	                                <i class="fa fa-institution"></i>
	                            </span>
	                        </div>
	                    </div>
	                </div>
            	</div>
            	<div class="block-content">
	                <div class="form-group mb-15">
	                    <label for="side-overlay-profile-email">Nama Mahasiswa</label>
	                    <div class="input-group">
	                        <select class="js-mahasiswa form-control" style="width: 92%;" name="mahasiswa">

							</select>
	                        <div class="input-group-append">
	                            <span class="input-group-text">
	                                <i class="fa fa-user"></i>
	                            </span>
	                        </div>
	                    </div>
	                </div>
            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                    <i class="fa fa-check"></i> Submit
                </button>
            </div>
        </div>
    </div>
</div> --}}

<table id="list">
<thead>
	<tr>
		<th>No.</th>
		<th>Mata Kuliah</th>
		<th>Dosen Pengajar</th>
		<th>Hari</th>
		<th>Tahun Ajaran</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
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
			<center>{!! Form::submit('Peserta',['class' => 'btn btn-primary']) !!}</center>
			{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
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
                    },
                    cache: true
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
