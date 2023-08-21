@extends('cms.cms-index')
@section('content')
<div class="row layout-top-spacing">
    <div class="col-lg-12 col-12">

        <div class="card">
    
            <div class="card-header d-flex justify-content-between align-items-center" style="font-size: 20px;">
                <span>{{ $submenu }}</span>
                <a href="{{ asset('storage/images/company/struktur-organisasi.jpg') }}" download class="btn btn-outline-success"><i class="fa-solid fa-download"></i></a>
            </div>
            <div class="card-body">
                <a href="{{ asset('storage/images/company/struktur-organisasi.jpg') }}" class="defaultGlightbox glightbox-content">
                    <img src="{{ asset('storage/images/company/struktur-organisasi.jpg') }}" class="card-img-top img-fluid" alt="StrukturOrganisasi" style="">
                </a>
            </div>
        </div>
    </div>
</div>

@endsection