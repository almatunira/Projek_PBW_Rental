@extends('layout')

@section('title', 'Daftar - Harmoni Rental');

@section('style')
<link rel="stylesheet" href="{{asset('css/daftar.css')}}">
@endsection

<div class="container">
	<div class="row justify-content-center">
			<div class="container col-lg-4">
			@if(session('status'))
				<div class="alert alert-danger text-center" >
					{{session('status')}}
				</div>
			@endif
			<div class="card border-1 text-center" id="daftar-form">
				<div class="card-header">
	        		<h3 class="font-weight-bold"><i class="fa-1x fas fa-user-plus"></i> Daftar User</h3>
				</div>
				<div class="card-body">
					<form action="{{url('/daftar')}}" method="post">
						@csrf
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-user"></i></div>
								</div>
								<input type="text" class="form-control" name="nama" placeholder="Nama lengkap" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-at"></i></div>
								</div>
								<input type="text" class="form-control" name="email" placeholder="E-mail" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-phone"></i></div>
								</div>
								<input type="text" class="form-control" name="nomor_hp" placeholder="Nomor HP" required>
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
						<button type="submit" class="btn btn-primary w-100 font-weight-bold">DAFTAR</button>
						<small class="text-left text-muted mt-2">Sudah punya akun? Login <a href="{{url('/login')}}">di sini</a></small>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>