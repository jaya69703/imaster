@extends('cms.cms-index')
@section('custom-css')
<link href="{{ asset('main') }}/src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">

<link href="{{ asset('main') }}/src/assets/css/light/components/list-group.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/assets/css/light/widgets/modules-widgets.css">

<link href="{{ asset('main') }}/src/assets/css/dark/components/list-group.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/assets/css/dark/widgets/modules-widgets.css">

<style>
    .box {
        border-radius: 10%;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
    }
    .icon {
        font-size: 25px;
    }

    #texarea {
        width: 100%; /* Lebar textarea mengikuti lebar parent (col-lg-6) */
        max-width: 100%; /* Tetapkan lebar maksimal 100% */
    }
</style>


@endsection

@section('content')


<div class="row layout-top-spacing">
    <div class="col-lg-3 col-12 mt-2 mb-2">
        <div class="card btn btn-outline-primary">
            <div class="card-body d-flex align-items-center">
                <div class="btn btn-primary border" style="border-radius: 10%; width: 60px; height: 60px; display: flex; justify-content: center; align-items: center;">
                    <i style="font-size: 30px" class="fa-solid fa-users"></i>
                </div>
                <div class="d-flex flex-column align-items-baseline">
                    <a class="icon" style="font-size: 20px; margin-left: 20px"> Jumlah Pengguna</a>
                    <a class="icon" style="font-size: 20px; margin-left: 20px"> {{ App\Models\User::count() }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 mt-2 mb-2">
        <div class="card btn btn-outline-secondary">
            <div class="card-body d-flex align-items-center">
                <div class="btn btn-secondary border" style="border-radius: 10%; width: 60px; height: 60px; display: flex; justify-content: center; align-items: center;">
                    <i style="font-size: 30px" class="fa-solid fa-users"></i>
                </div>
                <div class="d-flex flex-column align-items-baseline">
                    <a class="icon" style="font-size: 20px; margin-left: 20px"> Jumlah Pengguna</a>
                    <a class="icon" style="font-size: 20px; margin-left: 20px"> {{ App\Models\User::count() }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 mt-2 mb-2">
        <div class="card btn btn-outline-warning">
            <div class="card-body d-flex align-items-center">
                <div class="btn btn-warning border" style="border-radius: 10%; width: 60px; height: 60px; display: flex; justify-content: center; align-items: center;">
                    <i style="font-size: 30px" class="fa-solid fa-users"></i>
                </div>
                <div class="d-flex flex-column align-items-baseline">
                    <a class="icon" style="font-size: 20px; margin-left: 20px"> Jumlah Status</a>
                    <a class="icon" style="font-size: 20px; margin-left: 20px"> {{ App\Models\Status::count() }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 mt-2 mb-2">
        <div class="card btn btn-outline-success">
            <div class="card-body d-flex align-items-center">
                <div class="btn btn-success border" style="border-radius: 10%; width: 60px; height: 60px; display: flex; justify-content: center; align-items: center;">
                    <i style="font-size: 30px" class="fa-solid fa-users"></i>
                </div>
                <div class="d-flex flex-column align-items-baseline">
                    <a class="icon" style="font-size: 20px; margin-left: 20px"> Jumlah Pengguna</a>
                    <a class="icon" style="font-size: 20px; margin-left: 20px"> {{ App\Models\User::count() }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="row">
            <div class="col-lg-12 col-12">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="">Saved Postingan</a>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12 mt-2 mb-2">
        <div class="row">
            <div class="col-lg-12 col-12">
                <form action="{{ route('status.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                @guest
                                <div class="avatar avatar-lg" style="margin-right: 10px">
                                    <img alt="avatar" src="{{ asset('storage/images/profile/default.png') }}" class="rounded-circle"/>
                                </div>
                                <div class="d-flex flex-column align-items-baseline mt-2 flex-grow-1">
                                    <textarea name="content" id="texarea" cols="1" rows="1" class="form-control btn-rounded" placeholder="What's on your mind, Guest?"></textarea>
                                </div>
                                @else
                                <div class="avatar avatar-lg" style="margin-right: 10px">
                                    <img alt="avatar" src="{{ asset('storage/images/profile/'. Auth::user()->image) }}" class="rounded-circle"/>
                                </div>
                                <div class="d-flex flex-column align-items-baseline mt-2 flex-grow-1">
                                    <textarea name="content" id="texarea" cols="1" rows="1" class="form-control btn-rounded" placeholder="What's on your mind, {{Auth::user()->name}}?"></textarea>
                                </div>
                                @endguest
                            </div>
                            <hr>
                            <div class="row text-center mt-4">
                                <div class="col-6">
                                    <div class="btn btn-outline-success" style="font-size: 14px; margin-right: 5px">
                                        <i class="fa-solid fa-image" style="margin-right: 5px"></i>
                                        <span onclick="choosePhoto()" style="cursor: pointer">Photo</span>
                                        <input type="file" name="image" id="photoInput" style="display: none" onchange="handlePhotoChange(event)" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-outline-secondary" style="font-size: 14px; margin-right: 5px">
                                        <i class="fa-solid fa-paper-plane" style="margin-right: 5px"></i> Send
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @foreach ($status as $key => $item )
                <div class="col-lg-12 col-12 mt-3 mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between" >
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-lg" style="margin-right: 10px">
                                    <img alt="avatar" src="{{ asset('storage/images/profile/'.$item->user->image) }}" class="rounded-circle"  />
                                </div>
                                <div class="d-flex flex-column align-items-baseline mt-2">
                                    <a href="" style="font-size: 20px">{{ $item->user->name }}</a>
                                    <p href="" style="font-size: 15px">{{ $item->user->position->name . ' - ' . $item->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                            <div class="dropdown d-inline-block">
                                <a class="dropdown-toggle" href="#" role="button" id="elementDrodpown3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="elementDrodpown3" style="will-change: transform; position: absolute; transform: translate3d(-141px, 19px, 0px); top: 0px; left: 0px;">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="fa-solid fa-floppy-disk" style="font-size: 20px; margin-right: 5px;"></i> View Project</a>
                                    @if(Auth::check() && $item->user_id == Auth::user()->id)
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('status.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="button" class="dropdown-item" data-url="{{ route('status.destroy', $item->id) }}" data-name="{{ $item->content }}" onclick="deleteData('{{ $item->id }}')">
                                            <i style="font-size: 20px; margin-right: 5px;" class="fa-solid fa-trash-can"></i>
                                            <span>Delete Status</span>
                                        </a>
                                    </form>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>{{ $item->content }}</p>
                            @if($item->image)
                            <a href="{{ asset('storage/images/status/'.$item->image) }}" class="defaultGlightbox card-img-top glightbox-content">
                                <img src="{{ asset('storage/images/status/'.$item->image) }}" alt="image" class="img-fluid" />
                            </a>
                            @endif
                        </div>
                        <div class="card-footer">
                            <div class="row text-center">
                                <div class="col-4">
                                    <button class="btn btn-outline-danger" style="margin-right: 5px"><i class="fa-solid fa-heart" style="margin-right: 5px"></i>37 Likes</button>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-outline-secondary" style="margin-right: 5px"><i class="fa-solid fa-comment" style="margin-right: 5px"></i>37 Comment</button>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-outline-primary" style="margin-right: 5px"><i class="fa-solid fa-share" style="margin-right: 5px"></i>37 Share</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

    @guest
    <div class="col-lg-6 col-12 mt-2 mb-2">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between" >
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-lg" style="margin-right: 10px">
                        <img alt="avatar" src="{{ asset('storage/images/profile/default.png') }}" class="rounded-circle"  />
                    </div>
                    <div class="d-flex flex-column align-items-baseline mt-2">
                        <a href="" style="font-size: 20px">Guest Preview</a>
                        <p href="" style="font-size: 15px">Web Developer</p>
                    </div>
                </div>
                <div class="dropdown d-inline-block">
                    <a class="dropdown-toggle" href="#" role="button" id="elementDrodpown3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </a>

                    <div class="dropdown-menu left" aria-labelledby="elementDrodpown3" style="will-change: transform; position: absolute; transform: translate3d(-141px, 19px, 0px); top: 0px; left: 0px;">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="fa-solid fa-floppy-disk" style="font-size: 20px; margin-right: 5px;"></i> View Project</a>

                        <a class="dropdown-item" href="javascript:void(0);"><i class="fa-solid fa-floppy-disk" style="font-size: 20px; margin-right: 5px;"></i> View Project</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="fa-solid fa-floppy-disk" style="font-size: 20px; margin-right: 5px;"></i> View Project</a>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>Lorem Ipsum Duar Kendali Hijau Biru Merah</p>
                {{-- <iframe src="{{ asset('storage/images/profile/Tasya-2023-07-21.jpg') }}" frameborder="0" class="card-img-top img-fluid"></iframe> --}}
                <img src="{{ asset('storage/images/profile/Tasya-2023-07-21.jpg') }}" alt="" class="card-img-top img-fluid">
            </div>
            <div class="card-footer">
                <div class="row text-center">
                    <div class="col-4">
                        <button class="btn btn-outline-danger" style="margin-right: 5px"><i class="fa-solid fa-heart" style="margin-right: 5px"></i>37 Likes</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-outline-secondary" style="margin-right: 5px"><i class="fa-solid fa-comment" style="margin-right: 5px"></i>37 Comment</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-outline-primary" style="margin-right: 5px"><i class="fa-solid fa-share" style="margin-right: 5px"></i>37 Share</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endguest

</div>

@endsection

@section('custom-js')
<script src="{{ asset('main') }}/src/plugins/src/apex/apexcharts.min.js"></script>
<script src="{{ asset('main') }}/src/assets/js/widgets/modules-widgets.js"></script>
<script>
    function choosePhoto() {
    // Ini adalah fungsi yang akan dijalankan saat tombol "Photo" di klik
    document.getElementById('photoInput').click(); // Ini memicu pemilihan file
    }
</script>
@endsection
