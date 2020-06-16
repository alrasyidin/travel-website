@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
  </div>

  <!-- Content Row -->
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="card shadow">
    <div class="card-body">
      <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <select name="travel_package_id" class="form-control" required>
            <option value="" disabled selected>Pilih Paket</option>
            @foreach ($packages as $package)
            <option value="{{$package->id}}">{{$package->title}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <input type="file" class="form-control" name="image" placeholder="Upload image">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Tambah Gallery</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

@endsection