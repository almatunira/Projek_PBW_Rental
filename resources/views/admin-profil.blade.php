
@extends('layout')

@section('title', 'Admin - Harmoni Rental');

@section('style')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

<!-- <div class="container-fluid m-0"> -->
	<div class="row no-gutters mt-1 baris pt-3">
		<div class="col-md-3 bg-secondary mt-2 pr-3 pt-4 kolom">
			<p  class="admin ml-3 mb-0"><i class="fas fa-user-circle mr-2"></i>Admin</p>
			<ul class="nav flex-column text-white ml-5 mb-5 ">
			  <li class="nav-item">
			    <a class="nav-link" href="{{url('/admin')}}"><i class="fas fa-car"></i>Daftar Mobil</a> 
			    <hr class="bg-white m-0">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="{{url('/admin/data-pelanggan')}}"><i class="fas fa-address-book"></i>Data Pelanggan</a>
			    <hr class="bg-white m-0">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="{{url('/admin/riwayat')}}"><i class="fas fa-scroll"></i>Riwayat</a>
			    <hr class="bg-white m-0">
			  </li>
			  <li class="nav-item aktif text-primary">
			    <a class="nav-link" href="{{url('/admin/profil')}}"><i class="fas fa-user"></i>Profil</a>
			    <hr class="bg-white m-0">
			  </li>
			</ul>
		</div>
		<div class="col-md-9 d-flex justify-content-center">
			<div class="m-4 text-center p-5" id="tabel">
				<p style="font-size:1.5rem;"><i class="fas fa-user-circle fa-6x"></i></p>
						<p class="display-4 m-0">Harmoni Rental</p>
						<hr>
						<p style="font-size: 24px" class="text-muted mr-1"> <i class="fas fa-envelope-open-text"></i> harmoni_rental@gmail.com</p>
						<p style="font-size: 24px" class="text-muted mr-1"> <i class="fas fa-phone"></i> +628 76-6753-23</p>
						<p style="font-size: 24px" class="text-muted mr-1"> <i class="fas fa-map-marked-alt"></i> Jl. Bandara Sulthan Iskandar Muda <br>Banda Aceh</p>
			</div>
		</div>
	</div>
