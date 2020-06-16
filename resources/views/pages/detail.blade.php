@extends('layouts.app')

@section('title')
Nomads | Detail Travel
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@section('content')
<main>
  <section class="section-detail-header"></section>
  <div class="section-detail-content">
    <div class="container">
      <div class="row">
        <div class="col p-0">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Paket Travel</li>
              <li class="breadcrumb-item active">Details</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 pl-lg-0">
          <div class="card card-detail">
            <h1>{{$detail->title}}</h1>
            <p class="subtitle">
              {{$detail->location}}
            </p>
            @if ($detail->galleries->count())
              <div class="gallery">
                <div class="xzoom-container">
                  <img src="{{Storage::url($detail->galleries->first()->image)}}" alt="Gallery Image" class="xzoom" id="xzoom"
                    xoriginal="{{Storage::url($detail->galleries->first()->image)}}" />
                </div>
                <div class="xzoom-thumbs">
                  @foreach ($detail->galleries as $gallery)

                  @endforeach
                  <a href="{{ Storage::url($gallery->image)}}">
                    <img src="{{ Storage::url($gallery->image)}}" alt="Detail Image" width="120" height="60" style="object-fit: cover; object-position: top"
                      xpreview="{{ Storage::url($gallery->image)}}" class="xzoom-gallery" />
                  </a>
                </div>
              </div>
            @endif
            <h2>
              Tentang Wisata
            </h2>
            {!! $detail->about !!}

            <div class="features row">
              <div class="col-md-4">
                <img src="{{ asset('frontend/images/ic_event.png') }}" alt="Image Features" class="features-image">
                <div class="description">
                  <h3>Features Event</h3>
                  <p>{{$detail->featured_event}}</p>
                </div>
              </div>
              <div class="col-md-4 border-left">
                <img src="{{ asset('frontend/images/ic_language.png') }}" alt="Image Features" class="features-image">
                <div class="description">
                  <h3>Languages</h3>
                  <p>{{$detail->language}}</p>
                </div>
              </div>
              <div class="col-md-4 border-left">
                <img src="{{ asset('frontend/images/ic_foods.png') }}" alt="Image Features" class="features-image">
                <div class="description">
                  <h3>Foods</h3>
                  <p>{{$detail->foods}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-detail card-right">
            <h2>Members Are Going</h2>
            <div class="members my-2">
              <img src="{{ asset('frontend/images/member-going.png') }}" alt="Member Image" class="members-image">
              <img src="{{ asset('frontend/images/member-going.png') }}" alt="Member Image" class="members-image">
              <img src="{{ asset('frontend/images/member-going.png') }}" alt="Member Image" class="members-image">
              <img src="{{ asset('frontend/images/member-going.png') }}" alt="Member Image" class="members-image">
              <img src="{{ asset('frontend/images/member-going-2.png') }}" alt="Member Image" class="members-image">
            </div>
            <hr>
            <h2>Trip Information</h2>
            <table class="trip-information">
              <tr>
                <th width="50%">Date of Departure</th>
                <td width="50%" class="text-right">{{\Carbon\Carbon::create($detail->departure_date)->translatedFormat('d F, Y')}}</td>
              </tr>
              <tr>
                <th width="50%">Duration</th>
                <td width="50%" class="text-right">{{$detail->duration}}</td>
              </tr>
              <tr>
                <th width="50%">Type</th>
                <td width="50%" class="text-right">{{$detail->type}}</td>
              </tr>
              <tr>
                <th width="50%">Price</th>
                <td width="50%" class="text-right">@currency($detail->price) / person</td>
              </tr>
            </table>

            @auth
            <form action="{{ route('checkout_process', $detail->id )}}" method="post">
              @csrf
              <button class="btn btn-primary btn-block btn-trip mt-3 py-2" type="submit">Join Now</button>
            </form>
            @endauth

            @guest
              <a href="{{route('checkout', $detail->id)}}" class="btn btn-primary btn-block btn-trip mt-3 py-2">Login or Register to Join</a>
            @endguest
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@push('addon-script')
<script src="{{ asset('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
  $(document).ready(function () {
      $('.xzoom, .xzoom-gallery').xzoom({
          zoomWidth: 500,
          title: false,
          tint: '#fafafa',
          Xoffset: 15,
      });
  });

</script>
@endpush