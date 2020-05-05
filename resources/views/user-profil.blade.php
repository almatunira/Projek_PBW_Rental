
@extends('layout')

@section('title', 'Admin - Harmoni Rental');

@section('style')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

<!-- <div class="container-fluid m-0"> -->
	<div class="row no-gutters mt-1 baris pt-3">
		<div class="col-md-3 bg-secondary mt-2 pr-3 pt-4 kolom">
			<p  class="admin ml-3 mb-0"><i class="fas fa-user-circle mr-2"></i>{{session('nama')}}</p>
			<ul class="nav flex-column text-white ml-5 mb-5 ">
			 <li class="nav-item">
			    <a class="nav-link" href="{{url('/user')}}"><i class="fas fa-car"></i>Pemesanan Mobil</a> 
			    <hr class="bg-white m-0">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="{{url('/user/riwayat')}}"><i class="fas fa-scroll"></i>Riwayat</a>
			    <hr class="bg-white m-0">
			  </li>
			  <li class="nav-item aktif">
			    <a class="nav-link text-primary" href="{{url('/user/profil')}}"><i class="fas fa-user"></i>Profil</a>
			    <hr class="bg-white m-0">
			  </li>
			</ul>
		</div>
		<div class="col-md-9 d-flex justify-content-center">
			<div class="m-4 text-center p-5" id="tabel">
				<p style="font-size:1.5rem;"><i class="fas fa-user-circle fa-7x"></i></p>

						<p class="display-4 m-0">{{$user->nama}}</p>
						<hr>
						<p style="font-size: 24px" class="text-muted mr-1"> <i class="fas fa-envelope-open-text"></i> {{$user->email}}</p>
						<p style="font-size: 24px" class="text-muted mr-1"> <i class="fas fa-phone"></i> {{$user->nomor_hp}}</p>
			</div>
		</div>
	</div>
