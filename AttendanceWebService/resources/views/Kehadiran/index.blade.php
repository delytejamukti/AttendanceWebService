@extends('layouts.main')

@section('title')
    Ambil Kuliah
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