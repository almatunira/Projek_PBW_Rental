@extends('layout')

@section('title', 'Edit user- Harmoni Rental');

@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css')}}"> -->
@endsection
@section('content')
<div class="container">
	<div class="row justify-content-center mt-5">
		<div class="col-md-8">
			<p class="h1 text-center mb-2"><i class="fa fas-car"></i> Edit Data Akun</p>
			  <form action="{{url('/user/'.$user->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					{{method_field('PATCH')}}
					<div class="form-group mb-2">
						<p class="mb-1">Nama</p>
						<input type="text" class="form-control" name="nama" required value="{{$user->nama}}">
					</div>
					<div class="form-group mb-2">
						<p class="mb-1">Email</p>
						<input type="text" class="form-control" name="email" required value="{{$user->email}}">
					</div>
					<div class="form-group mb-2">
						<p class="mb-1">Nomor HP </p>
						<input type="text" class="form-control" name="nomor_hp" required value="{{$user->nomor_hp}}">
					</div>
					<div class="form-group mb-2">
						<p class="mb-1">Status</p>
						<input type="number	" class="form-control" name="status" required value="{{$user->status}}" readonly="">
					</div>
<!-- 					<div class="form-group mb-2">
						<img src="{{asset('img/'.$user->gambar)}}" alt="gambar user" width="100px" class="img-fluid">
						<p class="mb-1">Foto</p>
						<input type="file" class="form-control-file" name="gambar" placeholder="Gambar">
					</div> -->
					
		      	 	 <button type="submit" class="btn btn-success">Update Perubahan</button>
					 <a href="{{url()->previous()}}" class="btn btn-danger">Batal</a>
			</form>
		</div>
	</div>
</div>
@endsection