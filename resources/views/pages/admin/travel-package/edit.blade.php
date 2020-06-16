@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Paket Travel {{$item->title}}</h1>
  </div>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <!-- Content Row -->
  <div class="card shadow">
    <div class="card-body">
      <form action="{{route('travel-package.update', $item->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="{{ !is_null(old('title')) ? old('title') : $item->title}}">
        </div>
        <div class="form-group">
          <label for="location">Location</label>
          <input type="text" id="location" name="location" placeholder="Location" class="form-control"
            value="{{ !is_null(old('location')) ? old('location') : $item->location}}">
        </div>
        <div class="form-group">
          <label for="about">About</label>
          <textarea id="about" name="about" class="d-block w-100 form-control" cols="40" rows="10">{{!is_null(old('about')) ? old('about') : $item->about}}</textarea>
        </div>
        <div class="form-group">
          <label for="featured_event">Featured Event</label>
          <input type="text" id="featured_event" name="featured_event" placeholder="Featured Event" class="form-control"
            value="{{ !is_null(old('featured_event')) ? old('featured_event') : $item->featured_event}}">
        </div>
        <div class="form-group">
          <label for="title">Language</label>
          <input type="text" id="language" name="language" placeholder="Language" class="form-control"
            value="{{ !is_null(old('language')) ? old('language') : $item->language}}">
        </div>
        <div class="form-group">
          <label for="foods">Foods</label>
          <input type="text" id="foods" name="foods" placeholder="Foods" class="form-control" value="{{ !is_null(old('foods')) ? old('foods') : $item->foods}}">
        </div>
        <div class="form-group">
          <label for="duration">Duration</label>
          <input type="text" id="duration" name="duration" placeholder="Duration" class="form-control"
            value="{{ !is_null(old('duration')) ? old('duration') : $item->duration}}">
        </div>
        <div class="form-group">
          <label for="departure_date">Departure Date</label>
          <input type="date" id="departure_date" name="departure_date" placeholder="Departure Date" class="form-control"
            value="{{ !is_null(old('departure_date')) ? old('departure_date') : $item->departure_date}}">
        </div>
        <div class="form-group">
          <label for="type">Type</label>
          <input type="text" id="type" name="type" placeholder="Type" class="form-control" value="{{ !is_null(old('type')) ? old('type') : $item->type}}">
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" id="price" name="price" placeholder="Price" class="form-control" value="{{ !is_null(old('price')) ? old('price') : $item->price}}">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-pencil-alt"></i> Ubah Paket</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

@endsection