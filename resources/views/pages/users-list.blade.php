@extends('cms.cms-index')
@section('content')
<div class="row layout-top-spacing">
    @foreach($users as $user)
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-2 mb-2">
        <div class="card style-7">
            <a href="{{ url('/home/profile-dosen/show/'. $user->id ) }}" target="_blank">
                <img src="{{ asset('storage/images/profile/'. $user->image) }}" class="card-img-top" alt="User Profile" style="max-height: 375px;">
            </a>
            <div class="card-footer">
                <h5 class="card-title mb-0">{{ $user->name }}</h5>
                <p class="card-text mb-0">{{ $user->user_position }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection