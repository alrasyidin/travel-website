@extends('layouts.app')

@section('title') Nomads | Home @endsection

@section('content')
<!-- header -->
<header class="header text-center">
  <h1>
    Explore The Beautiful Worlld <br>
    as Easy One Click
  </h1>

  <p class="mt-3 mb-5">
    you will see beautiful <br>
    moment you never see before
  </p>

  <a href="#" class="btn btn-primary px-4 py-2 my-4">Get Started</a>
</header>

<!-- section statistic -->
<main>
  <div class="container">
    <section class="section-stats justify-content-center row" id="stats">
      <div class="col-3 col-md-2 stats-detail">
        <h2>20K</h2>
        <div>Members</div>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>12</h2>
        <div>Countries</div>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>3K</h2>
        <div>Hotels</div>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>72</h2>
        <div>Partners</div>
      </div>
    </section>
  </div>
</main>

<!-- section popular -->
<section class="section-popular" id="popular">
  <div class="container">
    <div class="row">
      <div class="col text-center section-popular-heading">
        <h3> Wisata Popular </h3>
        <p>Something that you never try <br> before in this world</p>
      </div>
    </div>
  </div>
</section>



<!-- popular content -->
<section class="section-popular-content">
  <div class="container">
    <div class="row section-popular-travel justify-content-center">
      @foreach ($packages as $package)
      <div class="col-10 col-sm-6 col-md-4 col-lg-3">
        <div class="card-travel text-center d-flex flex-column" style="background-image: url('{{$package->galleries->first()->image}}'); box-shadow: inset 0 0 0 2000px rgba(0, 0, 0, 0.3)">
          <div class="travel-country">{{$package->location}}</div>
          <div class="travel-location">{{ $package->title }}</div>
          <div class="travel-button mt-auto">
            <a href="{{route('detail', $package->slug)}}" class="btn btn-primary">
              View Deails
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- section network -->
<div class="section-network">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h3 class="network-title">Our Networks</h3>
        <p class="network-para">Companies are truested us <br /> than just a trip</p>
      </div>
      <div class="col-md-8 text-center align-center">
        <img src="{{url('frontend/images/networks.png')}}" alt="Logo Networks" />
      </div>
    </div>
  </div>
</div>


<!-- testimonial -->
<section class="section-testi" id="testi">
  <div class="container">
    <div class="row justify-content-center">
      <div class="testi-heading col text-center">
        <h3 class="testi-title">They Are Loving Us</h3>
        <p class="testi-para">Moments were giving them <br>the best experience</p>
      </div>
    </div>
  </div>
</section>

<section class="section-testi-content" id="testi-content">
  <div class="container">
    <div class="row justify-content-center">
      <div class="testi-item col-sm-6 col-md-6 col-lg-4">
        <div class="testi-desc">
          <div class="testi-item-content text-center">
            <img src="frontend/images/testi1.jpg" alt="Testimonial Image">
            <div class="testi-item-name">
              Hafidh Pradipta
            </div>
            <div class="testi-item-text">
              "Lorem Ipsum has been the industry's typesetting industry."
            </div>
          </div>
          <div class="testi-trip-to">
            <hr class="testi-hr">
            <div class="testi-note">Trip to Ubud, Bali Indonesia</div>
          </div>
        </div>
      </div>
      <div class="testi-item col-sm-6 col-md-6 col-lg-4">
        <div class="testi-desc">
          <div class="testi-item-content text-center">
            <img src="frontend/images/testi2.jpg" alt="Testimonial Image">
            <div class="testi-item-name">
              Ujang Perwira
            </div>
            <div class="testi-item-text">
              "Simply dummy text of Lorem Ipsum has been"
            </div>
          </div>
          <div class="testi-trip-to">
            <hr class="testi-hr">
            <div class="testi-note">Trip to Nusa Penida, Indonesia</div>
          </div>
        </div>
      </div>
      <div class="testi-item col-sm-6 col-md-6 col-lg-4">
        <div class="testi-desc">
          <div class="testi-item-content text-center">
            <img src="frontend/images/testi3.jpg" alt="Testimonial Image">
            <div class="testi-item-name">
              Bambang Wirahadi
            </div>
            <div class="testi-item-text">
              "Simply dummy text of the printing and typesetting industry. "
            </div>
          </div>
          <div class="testi-trip-to">
            <hr class="testi-hr">
            <div class="testi-note">Trip to Karimun, Indonesia</div>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-12 text-center button-more">
        <a href="#" class="btn btn-light px-4 mt-4 mx-1">I NEED HELP</a>
        <a href="#" class="btn btn-primary px-4 mt-4 mx-1">GET STARTED</a>
      </div>
    </div>
  </div>
</section>
@endsection