@extends('layouts.main')

@section('title')
    Mahasiswa
@endsection

@section('contents')

<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
				<h1 class="page-header text-center">Data Mahasiswa</h1>
				<hr class="col-md-12">
				<a href="{{route('mahasiswa.add')}}">
                	<button type="button" class="btn btn-primary" name="button" style="margin-bottom: 20px">Tambah Mahasiswa</button>
				</a>
			</div>
        </div>
	<div class="panel panel-default">
		<div class="panel-heading" style="background-color: #013880;color: white;">
				<i class="fa fa-user fa-fw"></i><b>Mahasiswa
			</b>
		</div>
		<div class="panel-body">
			<div class="table table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
						<th>#</th>
						<th>NRP</th>
						<th>Nama Mahasiswa</th>
						<th>Angkatan</th>
						<th>action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($mhs as $key => $mhs)
						<tr>
							<td>{{ $key+1}}</td>
							<td> {{ $mhs -> nrp}}</td>
							<td> {{ $mhs -> nama_mhs}}</td>
							<td> {{ $mhs -> angkatan}}</td>
							<td> <a href="{{ url('/mahasiswa/delete/'.$mhs->nrp) }}" class="btn btn-danger">Delete</a>
								<a href="{{ url('/mahasiswa/'.$mhs->nrp.'/edit/')}}" class=" btn btn-primary">Edit</a></td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

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