@extends('layouts.success')

@section('title')
Nomads | Success
@endsection

@section('content')
<main>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col text-center success">
        {{-- <img src="{{url('frontend/images/ic_success.jpg')}}" alt="Success Image" class="success-image"> --}}

        <div class="success-text">
          <h1>Oooppps!</h1>
          <p>
            Your transaction is unfinished.
          </p>
        </div>
        <a href="{{url('/')}}" class="btn btn-secondary">Home Page</a>
      </div>
    </div>
  </div>
</main>
@endsection