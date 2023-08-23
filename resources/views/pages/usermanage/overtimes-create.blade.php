@extends('cms.cms-index')
@section('content')
    @include('cms.cms-alert')
    <form action="{{ route('overtimes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="layout-top-spacing">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="font-size: 20px;">
                    <span>{{ $submenu }}</span>
                    <div>
                        <button type="button" class="btn btn-outline-danger btn-rounded mr-2" id="reset-button"><i class="fa-solid fa-arrows-rotate"></i></button>
                        <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-floppy-disk"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="img">
                                <img id="image-preview" src="{{ asset('storage/images/profile/default.png' ) }}" alt="Photo Profile" class="card-img-top">
                                <input class="form-control mt-2 mb-2" type="file" id="image" name="overtime_proof" accept="image/*">
                            </div>
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="row">
                                <div class="form-group col-lg-4 col-12 mb-2 mt-2">
                                    <label for="overtime_date">Overtimes Date</label>
                                    <input type="date" class="form-control" name="overtime_date">
                                </div>
                                <div class="form-group col-lg-4 col-12 mb-2 mt-2">
                                    <label for="overtime_start">Overtimes Start</label>
                                    <input type="time" name="overtime_start" id="overtime_start" class="form-control">
                                </div>
                                <div class="form-group col-lg-4 col-12 mb-2 mt-2">
                                    <label for="overtime_end">Overtimes End</label>
                                    <input type="time" name="overtime_end" id="overtime_end" class="form-control">
                                </div>
                                <div class="form-group col-lg-12 col-12 mb-2 mt-2">
                                    <label for="overtime_desc">Overtimes Description</label>
                                    <textarea name="overtime_desc" id="overtime_desc" cols="60" rows="10" class="form-control">Uraian Pekerjaan</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection
