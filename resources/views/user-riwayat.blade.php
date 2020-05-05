
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
			  <li class="nav-item aktif">
			    <a class="nav-link text-primary" href="{{url('/user/riwayat')}}"><i class="fas fa-scroll"></i>Riwayat</a>
			    <hr class="bg-white m-0">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="{{url('/user/profil/'.session('id'))}}"><i class="fas fa-user"></i>Profil</a>
			    <hr class="bg-white m-0">
			  </li>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="px-5 pt-5" id="tabel">
				<table class="table">
				  <thead class="table-dark">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Pelanggan</th>
				      <th scope="col">No Plat</th>
				      <th scope="col">Merek</th>
				      <th scope="col">Tipe</th>
				      <th scope="col">Tgl Order</th>
				      <th scope="col">Harga/hari</th>
				    </tr>
				  </thead>
				  <tbody>
			  		@if($transaksi->isEmpty())
			  			<tr>
			  				<td class="text-center bg-light" colspan="7">Tidak ada transaksi</td>
			  			</tr>
			  		@else
					  	@foreach($transaksi as $i => $tr)
					    <tr>
					      <th scope="row">1</th>
					      <td>{{$tr->nama_pelanggan}}</td>
					      <td>{{$tr->no_plat}}</td>
					      <td>{{$tr->merek}}</td>
					      <td>{{$tr->tipe}}</td>
					      <td>{{$tr->created_at}}</td>
					      <td>@currency($tr->harga)</td>
					    </tr>
					    @endforeach
					 @endif
				  </tbody>
				</table>
			</div>
		</div>
	</div>
