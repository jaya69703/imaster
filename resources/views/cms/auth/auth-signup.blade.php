@extends('cms.auth.auth-index')
@section('content')
<div class="card-header text-center pt-4">
    <div class="row px-xl-5 px-sm-4 px-3">
      <div class="mt-2 position-relative text-center">
        <img src="{{ asset('argon') }}/assets/img/logos/visa.png" alt="logo" class="card-img-top" style="max-width: 100px">
      </div>
    </div>
</div>
<div class="card-body">
    <form action="{{ route('register') }}" method="POST" role="form">
        @csrf
        <div class="mb-3">
            <label style="font-size: 14px" for="Name">Name</label>
          <input type="text" class="form-control" placeholder="Name" name="name" aria-label="Name">
        </div>
        <div class="mb-3">
            <label style="font-size: 14px" for="Email Address">Email Address</label>
          <input type="email" class="form-control" placeholder="Email" name="email" aria-label="Email">
        </div>
        <div class="mb-3">
          <label style="font-size: 14px" for="Phone Number">Phone Number ( Whatsapp )</label>
          <input type="text" class="form-control" placeholder="Phone Number" name="phone" aria-label="Phone">
        </div>
        <div class="form-check form-check-info text-start">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
          <label class="form-check-label" for="flexCheckDefault">
            I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
          </label>
        </div>
        <div class="text-center">
          <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
        </div>
        <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}" class="text-dark font-weight-bolder">Sign in</a></p>
      </form>
</div>
@endsection
