@extends('layouts.main')

@section('title')
    Ambil Kuliah
@endsection

@section('contents')

<strong style="font-size: 14pt"><center>Angkatan {{$angkatan}}</center></strong>
{!! Form::open(['action' => 'AmbilKuliahController@tambah', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
<table id="list">
<thead>
	<tr>
		<th>No.</th>
		<th>NRP</th>
		<th>Nama</th>
		<th>Angkatan</th>
		<th>Pilih</th>
	</tr>
</thead>
<tbody>
	@foreach($mhs as $p)
	<tr>
		<td>{{$c}}</td>
		<td>{{$p->nrp}}</td>
		<td>{{$p->nama_mhs}}</td>
		<td>{{$p->angkatan}}</td>
		<td>
			<input type="checkbox" name="nrp{{$c++}}" value="{{$p->nrp}}">
		</td>
	</tr>
	@endforeach
</tbody>
</table>
	<input type="hidden" name="jumlah" value="{{--$c}}">
	<input type="hidden" name="mk" id="mk" value="{{$jadwal}}">
<center><button type="submit" class="btn btn-success" >Tambah Mahasiswa</button> </center>
{!! Form::close() !!}
@endsection

@section('moreJS')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script>
        $(document).ready(function(){
            $('table').DataTable({
                "autoWidth": true,
                "ordering": false,
            });
        });
   //      function tambah(){
			// // element = document.getElementById('jumlah');
			// // if (element != null) {
			// //     alert(document.getElementById("jumlah").value;
			// // }
			// // else {
			// //     alert('kosong');
			// // }
        	
   //      	var jml= document.getElementById('jumlah').value;
   //      	var i=0;
   //      	for(i=1;i<=jml;i++){
   //      		if(document.getElementById('nrp'+i).checked==true){
		 //        	var dnrp = document.getElementById('nrp'+i).value;
		 //        	var dmk = document.getElementById('mk').value;
		 //        	//alert(nrp+" "+mk);
		 //        	$.ajax({
		 //                    type:'post',
		 //                    url: "{{url('/ambil_kuliah/peserta/tambah')}}",
		 //                    data: { 
		 //                    	nrp:dnrp,
		 //                    	mk :dmk
		 //                    },
		 //                    error: function(xhr, status, error) {
			// 				  var err = eval("(" + xhr.responseText + ")");
			// 				  alert(err.Message);
			// 				},
		 //                    success: function(result){
			//                     console.log(result);
			//                 }


		 //            });
		 //        }
   //      	}
   //      }
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

