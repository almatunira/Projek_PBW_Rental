
@extends('layout')

@section('title', 'Admin - Harmoni Rental');

@section('style')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Mobil Baru</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
		        <form action="{{url('/admin/mobil')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<input type="text" class="form-control" name="no_plat" placeholder="Nomor Plat" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="merek" placeholder="Merek" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="tipe" placeholder="Tipe" required>
					</div>
					<div class="form-group">
						<input type="number	" class="form-control" name="harga" placeholder="Harga/hari" required>
					</div>
					<div class="form-group">
						<small>Foto Mobil</small>
						<input type="file" class="form-control" name="gambar" placeholder="Gambar" required>
					</div>
					
		      	 	 <button type="submit" class="btn btn-success">Tambahkan Data</button>
					 <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

<!-- <div class="container-fluid m-0"> -->
	<div class="row no-gutters mt-1 baris pt-3">
		<div class="col-md-3 bg-secondary mt-2 pr-3 pt-4 kolom">
			<p  class="admin ml-3 mb-0"><i class="fas fa-user-circle mr-2"></i>Admin</p>
			<ul class="nav flex-column text-white ml-5 mb-5 ">
			  <li class="nav-item">
			    <a class="nav-link aktif text-primary" href="{{url('/admin')}}"><i class="fas fa-car"></i>Daftar Mobil</a>
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
			  <li class="nav-item">
			    <a class="nav-link" href="{{url('/admin/profil')}}"><i class="fas fa-user"></i>Profil</a>
			    <hr class="bg-white m-0">
			  </li>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="px-5 pt-4" id="tabel">
			<button href="" class="btn btn-success mb-2" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-plus" ></i> Tambah mobil</button>
				<table class="table">
				  <thead class="table-dark">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Foto</th>
				      <th scope="col">No Plat</th>
				      <th scope="col">Merek</th>
				      <th scope="col">Tipe</th>
				      <th scope="col">Harga/hari</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($mobil as $i => $mb)
				    <tr>
				      <th scope="row">{{++$i}}</th>
				      <td><img src="{{asset('img/'.$mb->gambar)}}" alt="mobil" class="img-fluid" width="50px"></td>
				      <td>{{$mb->no_plat}}</td>
				      <td>{{$mb->merek}}</td>
				      <td>{{$mb->tipe}}</td>
				      <td>@currency($mb->harga)</td>
				      <td>
				      		<form action="{{url('/admin/mobil/'.$mb->id)}}" method="post">
				      			@csrf
				      			{{method_field('DELETE')}}
				      			<a href="{{url('/admin/mobil/'.$mb->id.'/edit')}}" class="badge badge-primary p-2"><i class="fas fa-edit"></i></a>
				      			<button type="submit" class="badge badge-danger p-2 border-0" onclick="return confirm('Yakin ingin mengapus data ini?')"><i class="fas fa-trash"></i></button>
				      		</form>
				      </td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
<!-- </div> -->