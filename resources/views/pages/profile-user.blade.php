@extends('cms.cms-index')
@section('content')
    @include('cms.cms-alert')
    <form action="{{ route('home.update-user') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row layout-top-spacing">
            <div class="col-lg-4 col-12 mb-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" style="font-size: 20px;">
                        <span>Profile Singkat</span>
                        <div>
                            <button type="button" class="btn btn-outline-danger btn-rounded mr-2" id="reset-button"><i class="fa-solid fa-arrows-rotate"></i></button>
                            <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-floppy-disk"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="profile-image">
                            <div class="img">
                                <img id="image-preview" src="{{ asset('storage/images/profile/'. Auth::user()->image ) }}" alt="Photo Profile" class="card-img-top">
                                <input class="form-control mt-3" type="file" id="image" name="image" accept="image/*">
                            </div>
                            <hr>
                            <div class="form-group mt-2">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="position_id">Pilih Jabatan</label>
                                <select name="position_id" id="position_id" class="form-select @error('position_id') is-invalid @enderror" name="name">
                                    @if(Auth::user()->position_id)
                                    <option selected>{{ Auth::user()->position->name }}</option>
                                    @else
                                    @foreach ( $position as $item )
                                    <option selected disabled>Silahkan Pilih Jabatan</option>
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('position_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="phone">Nomor HP ( Whatsapp )</label>
                                <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}">
                                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="email">Alamat Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" disabled>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 mb-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" style="font-size: 20px;">
                        <span>Biodata Lengkap</span>
                        <div>
                            <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-floppy-disk"></i></button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group mt-2 col-lg-6 col-12">
                                <label for="user_placebirth">Tempat Lahir</label>
                                <input type="text" class="form-control @error('user_placebirth') is-invalid @enderror" name="user_placebirth" value="{{ Auth::user()->user_placebirth }}">
                                @error('user_placebirth') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2 col-lg-6 col-12">
                                <label for="user_datebirth">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('user_datebirth') is-invalid @enderror" name="user_datebirth" value="{{ Auth::user()->user_datebirth }}">
                                @error('user_datebirth') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2 col-lg-6 col-12">
                                <label for="user_typecard">Pilih Jenis Kartu Identitas</label>
                                <select name="user_typecard" id="user_typecard" class="form-select @error('user_typecard') is-invalid @enderror" name="name">
                                    @if(Auth::user()->user_typecard)
                                    <option selected value="{{ Auth::user()->user_typecard }}">{{ Auth::user()->user_typecard }}</option>
                                    @else
                                    <option selected disabled>Silahkan Pilih Jenis Kartu Identitas</option>
                                    <option value="KTP">KTP - Kartu Tanda Penduduk</option>
                                    <option value="KP">KP - Kartu Pelajar</option>
                                    <option value="SIM">SIM - Surat Izin Mengemudi</option>
                                    @endif
                                </select>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2 col-lg-6 col-12">
                                <label for="user_idcard">Masukkan Nomor Kartu Identitas</label>
                                <input type="text" class="form-control @error('user_idcard') is-invalid @enderror" name="user_idcard" value="{{ Auth::user()->user_idcard }}">
                                @error('user_idcard') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2 col-lg-6 col-12">
                                <label for="user_gender">Pilih Jenis Kelamin</label>
                                <select name="user_gender" id="user_gender" class="form-select @error('user_gender') is-invalid @enderror" name="name">
                                    @if(Auth::user()->user_gender)
                                    <option selected value="{{ Auth::user()->user_gender }}">{{ Auth::user()->user_gender }}</option>
                                    @else
                                    <option selected disabled>Silahkan Pilih Jenis Kelamin</option>
                                    <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    @endif
                                </select>
                                @error('user_gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2 col-lg-6 col-12">
                                <label for="user_religion">Pilih Agama</label>
                                <select name="user_religion" id="user_religion" class="form-select @error('user_religion') is-invalid @enderror" name="name">
                                    @if(Auth::user()->user_religion)
                                    <option selected value="{{ Auth::user()->user_religion }}">{{ Auth::user()->user_religion }}</option>
                                    @else
                                    <option selected disabled>Silahkan Pilih Agama Kamu</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Konghuchu">Konghuchu</option>
                                    @endif
                                </select>
                                @error('user_religion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
