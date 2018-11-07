@extends('layouts.main')

@section('title')
	Dosen - Menambah Data Dosen
@endsection

@section('contents')
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header text-center">Menambah Dosen</h1>
              <hr class="col-md-12">
			      </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" style="background-color: #013880;color: white;">
              <i class="fa fa-user fa-fw"></i><b>Tambah Dosen</b>
          </div>
          <div class="panel-body border border-primary">
            <form class="form-horizontal" action="/dosen/store" method="POST" >
              @csrf
              <div class="form-group">
                <label class="control-label col-sm-2">NIP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nip" placeholder="Masukan NIP" name="nip">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2">Nama Dosen</label>
                <div class="col-sm-10">          
                  <input type="text" class="form-control" id="nama_dosen" placeholder="Masukan Nama Dosen" name="nama_dosen">
                </div>
              </div>

              <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
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