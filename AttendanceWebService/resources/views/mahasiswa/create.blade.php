@extends('layouts.main')

@section('title')
    Mahasiswa
@endsection

@section('contents')

<form class="form-horizontal" action="/mahasiswa/store" method="POST" >
    @csrf
    <div class="form-group">
      <label class="control-label col-sm-2">NRP</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nrp" placeholder="Masukan NRP" name="nrp">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Nama Mahasiswa</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="nama_mhs" placeholder="Masukan Nama Mahasiswa" name="nama_mhs">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>

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