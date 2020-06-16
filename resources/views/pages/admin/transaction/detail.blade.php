@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Transaction</h1>
  </div>

  <!-- Content Row -->
  <div class="card shadow">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th>ID</th>
            <td>{{$item->id}}</td>
          </tr>
          <tr>
            <th>Paket Travel</th>
            <td>{{$item->travel_package->title}}</td>
          </tr>
          <tr>
            <th>Pembeli</th>
            <td>{{$item->user->name}}</td>
          </tr>
          <tr>
            <th>Additional VISA</th>
            <th>@currency($item->additional_visa)</th>
          </tr>
          <tr>
            <th>Transaction Total</th>
            <th>@currency($item->transaction_total)</th>
          </tr>
          <tr>
            <th>Transaction Status</th>
            <td>{{$item->transaction_status}}</td>
          </tr>
          <tr>
            <th>Pembelian</th>
            <td>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nationality</th>
                    <th>Visa</th>
                    <th>DOE Passport</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($item->detail as $detail)
                    <tr>
                      <td>{{$detail->id}}</td>
                      <td>{{$detail->username}}</td>
                      <td>{{$detail->nationality}}</td>
                      <td>{{$detail->is_visa ? "30 Days" : "N/A"}}</td>
                      <td>{{$detail->doe_passport}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

@endsection