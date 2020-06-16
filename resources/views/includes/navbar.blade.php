<!-- Navbar -->
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-white row">
    <a href="{{route('home')}}" class="navbar-brand">
      <img src="{{url('frontend/images/logo.png')}}" alt="Logo Nomads">
    </a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#menu"><span
        class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ml-auto mr-3">
        <li class="nav-item mx-md-2">
          <a href="{{route('home')}}" class="nav-link active">Home</a>
        </li>
        <li class="nav-item mx-md-2">
          <a href="#" class="nav-link">Paket Travel</a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="menu-dropdown">Service</a>

            <div class="dropdown-menu" aria-labelledby="menu-dropdown">
              <a class="dropdown-item" href="#">Satu</a>
              <a class="dropdown-item" href="#">Dua</a>
              <a class="dropdown-item" href="#">Tiga</a>
            </div>

          </div>
        </li>
        <li class="nav-item mx-md-2">
          <a href="#" class="nav-link">Testimonial</a>
        </li>

      </ul>

      @guest
        <!-- mobile button login -->
        <form class="form-inline d-sm-block d-md-none">
          <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href=
          '{{url('login')}}';">Masuk</button>
        </form>

        <!-- dekstop button login -->
        <form class="form-inline my-2 my-sm-0 d-none d-md-block">
          <button class="btn btn-login btn-login-desk btn-navbar my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href=
          '{{url('login')}}';">Masuk</button>
        </form>
      @endguest

      @auth
        <!-- mobile button login -->
        <form class="form-inline d-sm-block d-md-none" method="post" action="{{url('logout')}}">
          @csrf
          <button class="btn btn-login my-2 my-sm-0">Keluar</button>
        </form>

        <!-- dekstop button login -->
        <form class="form-inline my-2 my-sm-0 d-none d-md-block" method="post" action="{{url('logout')}}">
          @csrf
          <button class="btn btn-login btn-login-desk btn-navbar my-2 my-sm-0 px-4">Keluar</button>
        </form>
      @endauth
    </div>
  </nav>
</div>