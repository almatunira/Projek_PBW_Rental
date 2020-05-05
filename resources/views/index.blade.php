@extends('layout')

@section('title', 'Home - Harmoni Rental');

@section('style')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content');
	<div class="container-fluid home-container">
		<div class="row justify-content-center">
			<div class="col-lg text-center kolom-1">
				<img src="{{asset('img/car.svg')}}" alt="car" class="img-fluid gambar">
				<p class="lead"><span>H</span>armoni <span>	R</span>ental <span>	A</span>ceh</p>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-2 d-flex justify-content-center">
				<div class="admin">	
					<a href="{{url('/admin/login')}}" class="btn btn-outline-primary">
						<i class="fas fa-users-cog fa-7x">	</i>
						<p>Admin</p>
					</a>
				</div>
			</div>
			<div class="col-lg-3 d-flex justify-content-center">
				<div class="user">	
					<a href="{{url('/user')}}" class="btn btn-outline-primary">
						<i class="fas fa-users fa-7x">	</i>
						<p>User</p>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

<style>
	body#body{
		background-color: lightblue;
	}
</style>