@extends('layout')

@section('title', 'Edit user- Harmoni Rental');

@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css')}}"> -->
@endsection
@section('content')
<div class="container">
	<div class="row justify-content-center mt-5">
		<div class="col-md-5">
			<p class="h1 text-center mb-4"><i class="fa fas-car"></i> Ubah Password</p>
				@if(session('error'))
					<div class="alert alert-danger text-center" >
						{{session('error')}}
					</div>
				@endif
			  <form action="{{url('/user/password/'.session('id'))}}" method="post" enctype="multipart/form-data">
					@csrf
					{{method_field('PATCH')}}
				<div class="form-group mb-2">
					<p class="mb-1">Password saat ini</p>
					<input type="password" class="form-control" name="password_sekarang" required>
				</div>
				<div class="form-group mb-2">
					<p class="mb-1">Password baru</p>
					<input type="password" class="form-control" name="password_baru" required>
				</div>
				<div class="form-group mb-3">
					<p class="mb-1">Konfirmasi Password baru</p>
					<input type="password" class="form-control" name="konfirmasi_password_baru" required>
				</div>

		      	<button type="submit" class="btn btn-primary">Ubah Password</button>
		      	 <a href="{{url()->previous()}}" class="btn btn-danger">Batal</a>
			</form>
		</div>
	</div>
</div>
@endsection