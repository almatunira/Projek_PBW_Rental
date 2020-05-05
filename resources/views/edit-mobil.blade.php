@extends('layout')

@section('title', 'Edit mobil- Harmoni Rental');

@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css')}}"> -->
@endsection
@section('content')
<div class="container">
	<div class="row justify-content-center mt-5">
		<div class="col-md-8">
			<p class="h1 text-center mb-2"><i class="fa fas-car"></i> Edit data mobil</p>
			  <form action="{{url('/admin/mobil/'.$mobil->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					{{method_field('PATCH')}}
					<div class="form-group mb-2">
						<p class="mb-1">Nomor Plat</p>
						<input type="text" class="form-control" name="no_plat" required value="{{$mobil->no_plat}}">
					</div>
					<div class="form-group mb-2">
						<p class="mb-1">Merek</p>
						<input type="text" class="form-control" name="merek" required value="{{$mobil->merek}}">
					</div>
					<div class="form-group mb-2">
						<p class="mb-1">Tipe</p>
						<input type="text" class="form-control" name="tipe" required value="{{$mobil->tipe}}">
					</div>
					<div class="form-group mb-2">
						<p class="mb-1">Harga /hari</p>
						<input type="number	" class="form-control" name="harga" required value="{{$mobil->harga}}">
					</div>
					<div class="form-group mb-2">
						<img src="{{asset('img/'.$mobil->gambar)}}" alt="gambar mobil" width="100px" class="img-fluid">
						<p class="mb-1">Foto Mobil</p>
						<input type="file" class="form-control" name="gambar" placeholder="Gambar">
					</div>
					
		      	 	 <button type="submit" class="btn btn-success">Update Perubahan</button>
					 <a href="{{url('/admin')}}" class="btn btn-danger">Batal</a>
			</form>
		</div>
	</div>
</div>
@endsection