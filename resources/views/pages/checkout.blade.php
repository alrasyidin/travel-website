@extends('layouts.checkout')

@section('title')
Nomads | Checkout
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{url('frontend/libraries/gijgo/css/gijgo.min.css')}}">
@endpush

@section('content')
<main>
  <section class="section-detail-header"></section>
  <div class="section-detail-content">
    <div class="container-lg">
      <div class="row">
        <div class="col">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Paket Travel</li>
              <li class="breadcrumb-item">Details</li>
              <li class="breadcrumb-item active">Checkout</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 pl-lg-0">
          <div class="card card-detail">
            <h1>Who is Going</h1>
            <p class="subtitle">
              Trip to Ubud, Bali, Indonesia
            </p>
            <div class="atendee">
              <div class="table-responsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>Picture</th>
                      <th>Name</th>
                      <th>Nationality</th>
                      <th>VISA</th>
                      <th>Passport</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($transaction->detail as $index => $detail)
                    <tr>
                      <td>
                        <img width="50" height="50" src="https://ui-avatars.com/api/?name={{$detailUser[$index]->name}}"
                          alt="Avatar Image">
                      </td>
                      <td>{{$detailUser[$index]->name}} </td>
                      <td>{{ $detail->nationality }}</td>
                      <td>{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                      <td>
                        {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}
                      </td>
                      <td class="cancel"><a href="{{route('checkout-remove', $detail->id)}}"
                          onclick="return confirm('Are you sure to remove this user');">&times;</a></td>
                    </tr>
                    @empty
                    <tr>
                      <td class="text-center" colspan="6">No data</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>

            <div class="add-member">
              <h2>Add Member</h2>
              <form action="{{route('checkout-create', $transaction->id)}}" class="form-inline" method="post">
                @csrf
                <label for="username" class="sr-only">Username</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="username" name="username"
                  placeholder="Username">
                <label for="VISA" class="sr-only">VISA</label>
                <select name="is_visa" id="VISA" class="form-control mb-2 mr-sm-2 custom-select">
                  <option value="" default selected>VISA</option>
                  <option value="1">30 DAYS</option>
                  <option value="0">N/A</option>
                </select>
                <label for="nationality" class="sr-only">Nationality</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="nationality" name="nationality"
                  style="width:70px" placeholder="Nationality">
                <label for="doe_passport" class="sr-only">DOE Passport</label>
                <div class="input-group mb-2 mr-sm-2">
                  <input type="text" class="form-control datepicker" placeholder="DOE Passport" id="doe_passport"
                    name="doe_passport" />
                </div>
                <button class="btn btn-secondary mb-2 px-4">Add Now</button>
              </form>
            </div>
            <h3 class="mt-2 mb-0">Note</h3>
            <p class="disclaimer mb-0">
              You are only able to invite member that has registered in Nomads.
            </p>
          </div>
        </div>

        <div class="col-md-4 mt-3 mt-md-0 pr-lg-0">
          <div class="card card-detail card-right">
            <h2>Checkout Information</h2>
            <table class="trip-information">
              <tr>
                <th width="50%">Members</th>
                <td width="50%" class="text-right">{{$transaction->detail->count()}} Persons</td>
              </tr>
              <tr>
                <th width="50%">Additional VISA</th>
                <td width="50%" class="text-right">@currency($transaction->additional_visa)</td>
              </tr>
              <tr>
                <th width="50%">Trip Price</th>
                <td width="50%" class="text-right">@currency($transaction->travel_package->price) </td>
              </tr>
              <tr>
                <th width="50%">Subtotal</th>
                <td width="50%" class="text-right">@currency($transaction->transaction_total)</td>
              </tr>
              <tr>
                <th width="60%"><b>Total(+Unique Code)</b></th>
                @php
                $unique = mt_rand(0,99);
                $grand_total = $transaction->transaction_total + $unique;
                @endphp
                {{-- ,<span class="unique">{{mt_rand(0,99)}}</span> --}}
                <td width="40%" class="text-right"><b>@currency($grand_total)</b></td>
              </tr>
            </table>

            <hr>
            <h2>Payment Instruction</h2>
            <p>
              Please complete payment before you continue the wonderful trip
            </p>
            <div class="payment">
              <img width="100" src="{{url('frontend/images/ic_bank-bca.png')}}" alt="Payment Image">

              {{-- <div class="payment-desc">
                <div>PT NOMADS ID</div>
                <div>841231211</div>
                <div>Bank Rakyat Indonesia</div>
              </div> --}}
            </div>
            <div class="payment">
              <img width="100" src="{{url('frontend/images/ic_bank-mandiri.png')}}" alt="Payment Image">

              {{-- <div class="payment-desc">
                <div>PT NOMADS ID</div>
                <div>712371261</div>
                <div>Bank Central Asia</div>
              </div> --}}
            </div>


            <div class="payment"><img src="{{url('frontend/images/ic_gopay.png')}}" alt="Logo Gopay" width="100"></div>

            <div class="payment"><img src="{{url('frontend/images/ic_alfa_indo.png')}}" alt="Logo Alfa Indo" width="100"></div>

            <a href="{{route('checkout-success', $transaction->id)}}" class="btn btn-primary btn-trip">Process Payment</a>
            <a href="{{route('detail', $transaction->travel_package->slug)}}" class="cancel-booking mt-3">Cancel
              Booking</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@push('addon-script')
<script src="{{url('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      uiLibrary: 'bootstrap4',
      icons: {
        rightIcon: '<img src="{{ url('frontend/images/ic_date@2x.png') }}" alt="Icon Image"/>',
      }
    })
  });
</script>
@endpush