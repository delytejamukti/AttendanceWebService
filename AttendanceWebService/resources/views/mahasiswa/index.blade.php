@extends('layouts.main')

@section('title')
    Mahasiswa
@endsection

@section('contents')

<table class="table table-stripped">
			<thead>
				<tr>
					<th>#</th>
					<th>NRP</th>
					<th>Nama Mahasiswa</th>
					<th>action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($mhs as $key => $mhs)
				<tr>
				<!-- <td></td> -->
					<td>{{ $key+1}}</td>
					<td> {{ $mhs -> nrp}}</td>
					<td> {{ $mhs -> nama_mhs}}</td>
					<td> <a href="{{ url('/mahasiswa/delete/'.$mhs->nrp) }}" class="btn btn-danger">Delete</a>
						<a href="{{ url('/mahasiswa/'.$mhs->nrp.'/edit/')}}" class=" btn btn-primary">Edit</a></td>
				</tr>
				@endforeach

			</tbody>
		</table>

@endsection

@section('custom-js')
        <script src="assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
        <script src="assets/js/plugins/chartjs/Chart.bundle.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_blocks_widgets_stats.js"></script>
        <script>
            jQuery(function () {
                // Init page helpers (Easy Pie Chart plugin)
                Codebase.helpers('easy-pie-chart');
            });
        </script>
@endsection