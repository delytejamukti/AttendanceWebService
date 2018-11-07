@extends('layouts.main')

@section('title')
    Mata Kuliah
@endsection

@section('contents')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">Data Mata Kuliah</h1>
            <hr class="col-md-12">
            <a href="{{route('mk.add')}}">
                <button type="button" class="btn btn-primary" name="button" style="margin-bottom: 20px">Tambah Mata Kuliah</button>
            </a>
        </div>
    </div>
	<div class="panel panel-default">
		<div class="panel-heading" style="background-color: #013880;color: white;">
				<i class="fa fa-user fa-fw"></i><b>Mata Kuliah
			</b>
		</div>
		<div class="panel-body">
			<div class="table table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Mata Kuliah</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                        <tr>
                            <td>{{$row->kode_mk}}</td>
                            <td>{{$row->nama_mk}}</td>
                            <td>
                                {{ Form::open(['route' => ['matakuliah.delete', $row->kode_mk], 'method' => 'delete']) }}
                                    <a href="/mata-kuliah/edit/{{$row->kode_mk}}">
                                        <button type="button" class="btn btn-primary">edit</button>
                                    </a>
                                    <button type="submit" class="btn btn-danger">hapus</button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection