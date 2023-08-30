@extends('cms.cms-index')
@section('content')
    @include('cms.cms-alert')
    <form action="{{ route('web.update', $website->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row layout-top-spacing">
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <span style="font-size: 20px;">Website Logo</span>
                    </div>
                    <div class="card-body">
                        <div class="img">
                            <img id="image-preview" src="{{ asset('storage/images/logo/'. $website->web_logo ) }}" alt="Photo Profile" class="card-img-top">
                            <input class="form-control mt-3" type="file" id="image" name="web_logo" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span style="font-size: 20px;">Website Setting</span>
                        <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-plane-departure"></i></button>
                    </div>
                    <div class="card-body row">
                        <div class="form-group col-lg-6 col-12">
                            <label for="Website Name">Website Name</label>
                            <input required type="text" name="web_name" id="web_name" class="form-control btn-rounded @error('web_name') is-invalid @enderror" placeholder="Enter your website name..." value="{{ $website->web_name }}">
                            @error('web_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label for="Website Developer">Website Developer</label>
                            <input required type="text" name="web_dev" id="web_dev" class="form-control btn-rounded @error('web_dev') is-invalid @enderror" placeholder="Enter your website name..." value="{{ $website->web_dev }}">
                            @error('web_dev') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row layout-top-spacing">
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <span style="font-size: 20px;">Database Set-Up</span>
                </div>
                <div class="card-body">
                    <a href="{{ route('web.download-db') }}" class="btn btn-outline-success">Backup DB</a>
                </div>
            </div>
        </div>
    </div>

@endsection
