@extends('layouts.main')

@section('title')
    Edit Kehadiran
@endsection

@section('contents')
     <a href="{{url('/kehadiran')}}"><button type="submit" class="btn btn-danger">Back</button></a>
     <br>
     <br>
    <h2>Edit Catatan</h2>
    <form method="POST" action="{{url('kehadiran/edit/submit')}}">
        {{csrf_field()}}
        {{Form::text('id', $kehadiran->id, ['hidden'])}}
        <div class="form-group">
            <label for="catatan">Catatan</label>
            <input class="form-control" name="catatan" value="{{$kehadiran->catatan}}">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
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
