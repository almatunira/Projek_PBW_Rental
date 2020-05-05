
@extends('layout')

@section('title', 'User - Harmoni Rental');

@section('style')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
<link rel="stylesheet" href="{{asset('css/produk.css')}}">
@endsection

<!-- <div class="container-fluid m-0"> -->
	<div class="row no-gutters mt-1 baris pt-3">
		<div class="col-md-3 bg-secondary mt-2 pr-3 pt-4 kolom">
			<p  class="admin ml-3 mb-0"><i class="fas fa-user-circle mr-2"></i>{{session('nama')}}</p>
			<ul class="nav flex-column text-white ml-5 mb-5 ">
			  <li class="nav-item">
			    <a class="nav-link aktif text-primary" href="{{url('/user')}}"><i class="fas fa-car"></i>Pemesanan Mobil</a> 
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
		<div class="col-md-9 px-5 pt-5 " id="tabel">
			<div class="row">
				@foreach($mobil as $mb)
				  <div class="col-md-3 col-sm-6 mb-3">
			        <a href="{{url('/user/order/'.$mb->id)}}" id="link">
			        	<div class="card  shadow produk">
				          <img src="{{asset('img/'.$mb->gambar)}}" alt="mobil" class="card-img-top">
				          <div class="card-body p-0 px-3">
				           <p class="card-title ml-1">{{$mb->merek}}</p>
				            <p class="ml-1 mb-0" id="deskripsi">
				             <small class="text-muted">Tipe: {{$mb->tipe}}</small>	
				            </p>
				              <p><i class="fas fa-car"></i> @currency($mb->harga)/hari</p>
				            <a href="{{url('/user/order/'.$mb->id)}}"	class="w-100 btn btn-primary text-white">Order</a>
				          </div>
				        </div>
			        </a>
			    </div>
			    @endforeach
		    </div>
		</div>
	</div>
