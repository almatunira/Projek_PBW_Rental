@extends('layout')

@section('title', 'Login - Harmoni Rental');

@section('style')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
			<div class="container col-lg-4">
				@if(session('error'))
					<div class="alert alert-danger text-center" >
						{{session('error')}}
					</div>
				@endif
			<div class="card border-1 text-center" id="daftar-form">
				<div class="card-header">
	        		<h3 class="font-weight-bold"><i class="fa-1x fas fa-user"></i> Login</h3>
				</div>
				<div class="card-body">
					<form action="{{url('/login')}}" method="post">
						@csrf
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-at"></i></div>
								</div>
								<input type="text" class="form-control" name="email" placeholder="Email" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
								</div>
								<input type="password" class="form-control" name="password" placeholder="Password" required>
							</div>
						</div>
						<button type="submit" class="btn btn-primary w-100 font-weight-bold">MASUK</button>
						<small class="text-left text-muted mt-2">Belum punya akun? Daftar <a href="{{url('/daftar')}}">di sini</a></small>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection