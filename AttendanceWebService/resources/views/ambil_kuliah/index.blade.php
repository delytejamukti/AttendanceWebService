@extends('layouts.main')

@section('title')
    Ambil Kuliah
@endsection
@section('contents')

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
