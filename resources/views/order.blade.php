
@extends('layout')

@section('title', 'Order - Harmoni Rental');

@section('style')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

<!-- Button trigger modal -->
<button type="button" class="btn btn-transparent" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Order</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body text-center">
			<img src="{{url('img/'.$mobil->gambar)}}" alt="mobil"  class="img-fluid" style="height: 150px; width: auto;">
	        <h3>Kamu akan melakukan order mobil <span class="font-weight-bold">{{$mobil->merek}} Tipe {{$mobil->tipe}}</span> dengan harga <span class="font-weight-bold text-primary"><br>@currency($mobil->harga)/hari</span></h3>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal Order</button>

	        <form action="{{url('/user/order')}}" method="post">
				@csrf
				<input type="hidden" name="nama_pelanggan" value="{{@session('nama')}}">
				<input type="hidden" name="id_user" value="{{@session('id')}}">
				<input type="hidden" name="no_plat" value="{{$mobil->no_plat}}">
				<input type="hidden" name="merek" value="{{$mobil->merek}}">
				<input type="hidden" name="tipe" value="{{$mobil->tipe}}">
				<input type="hidden" name="harga" value="{{$mobil->harga}}">
	      	 	 <button type="submit" class="btn btn-primary mt-3">Order Sekarang!</button>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

<!-- <div class="container-fluid m-0"> -->
	<div class="row no-gutters mt-1 baris pt-1">
		<div class="col-md-3 bg-secondary mt-2 pr-3 pt-4 kolom">
			<p  class="admin ml-3 mb-0"><i class="fas fa-user-circle mr-2"></i>{{@session('nama')}}</p>
			<ul class="nav flex-column text-white ml-5 mb-5 ">
			  <li class="nav-item">
			    <a class="nav-link" href="{{url('/user')}}"><i class="fas fa-car"></i>Pemesanan Mobil</a> 
			    <hr class="bg-white m-0">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="{{url('/user/riwayat')}}"><i class="fas fa-scroll"></i>Riwayat</a>
			    <hr class="bg-white m-0">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="{{url('/user/profil/'.session('id'))}}"><i class="fas fa-user"></i>Profil</a>
			    <hr class="bg-white m-0">
			  </li>
			</ul>
		</div>
		<div class="col-md-9 d-flex justify-content-center mt-2">
			<div class=" text-center" id="tabel">
				<p class="display-4">{{$mobil->merek}} Tipe {{$mobil->tipe}}</p>
				<img src="{{url('img/'.$mobil->gambar)}}" alt="mobil"  class="img-fluid" style="height: 250px; width: auto;">
				   <a href="" class="btn btn-primary mt-2 px-5 py-3 d-block" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-plus"></i> Order Mobil ini</a>
				<hr>
				   <p class="text-primary h3"><i class="fas fa-car"></i> {{$mobil->no_plat}}</p>
				   <p class="text-primary h3"><i class="fas fa-car"></i> @currency($mobil->harga)/hari</p>
			</div>
		</div>
	</div>
