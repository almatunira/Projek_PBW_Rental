<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('style')
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome-free/css/all.min.css')}}">
	<title>@yield("title","Harmoni Rental")</title>
</head>

<body id="body">

	<!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}">
        <i class="fa-1x fas fa-car"></i>
        <span class="font-weight-bold">HARMONI RENTAL</span>
      </a>
  	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav ml-auto">
			   <li class="nav-item">
	          <a class="nav-link active" href="{{url('/')}}">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active " href="#" data-toggle="modal" data-target="#exampleModalScrollable" >About</a>
	        </li>
	        @if(session('login'))
         <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cog"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{url('/user/'.session('id').'/edit')}}"><i class="fas fa-user"></i> Edit Profil</a>
              <a class="dropdown-item" href="{{url('/user/password/'.session('id').'/edit')}}"><i class="fas fa-key"></i> Ubah password</a>
            </div>
          </li>
			   <a href="{{url('/logout')}}" class="btn btn-danger ml-3"><i class="fas fa-sign-out-alt"></i> Logout</a>
			    @endif
	  </ul>
	</div>
</div>
</nav>
  <!-- END NAVBAR -->

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">About</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <p class="display-4 m-0">Harmoni Rental</p>
            <hr>
            <p style="font-size: 16px" class="text-muted mr-1"> <i class="fas fa-envelope-open-text"></i> harmoni_rental@gmail.com</p>
            <p style="font-size: 16px" class="text-muted mr-1"> <i class="fas fa-phone"></i> +628 76-6753-23</p>
            <p style="font-size: 16px" class="text-muted mr-1"> <i class="fas fa-map-marked-alt"></i> Jl. Bandara Sulthan Iskandar Muda <br>Banda Aceh</p>
            <p style="font-size: 16px" class="text-muted mr-1"> <i class="fas fa-car"></i> Armada yang dimiliki:
              <ul>
                <li>All New Avanza</li>
                <li>Innova Reborn</li>
                <li>Fortuner VRZ</li>
                <li>Toyota Laxio</li>
                <li>Toyota Agya</li>
                <li>Daihatsu Xenia</li>
                <li>dll</li>
              </ul></p>
            <p style="font-size: 16px" class="text-muted mr-1"> <i class="fas fa-key"></i> Lepas Kunci :  YES</p>
            <p style="font-size: 16px" class="text-muted mr-1"> <i class="fas fa-car"></i> Harga Mulai :  Rp 300 Ribu</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


  <div class="wrapper">	
  		
  		@yield('content')

  		<div class="push">	</div>
  </div>

<!-- FOOTER -->
<footer class="	footer bg-primary fixed-bottom">
    <p class="mb-0">&copy; Copyright <b>Harmoni Rental Aceh</b> | 2020</p>
</footer>

<!-- Modal Status -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Pemberitahuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
        @if(session('status'))
        <i class="fas fa-check-circle fa-7x text-success mb-2"></i>
        <h3> {{session('status')}}</h3>
        @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<!-- END FOOTER -->

	 <script src="{{asset('js/jquery.min.js')}}"></script>
	 <script src="{{asset('js/popper.min.js')}}"></script>
	 <script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/script.js')}}"></script>

    @if(session('status'))
      <script>
          $(document).ready(function(){
            $('#statusModal').modal('show');
          });
      </script>
  @endif

</body>
</html>