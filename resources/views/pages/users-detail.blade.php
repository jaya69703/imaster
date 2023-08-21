@extends('cms.cms-index')
@section('content')
    @auth
    @include('cms.cms-alert')
    @endauth
    <div class="row layout-top-spacing">
        <div class="col-lg-4 col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="font-size: 20px;">
                    <span>Profile Singkat</span>
                    <div>
                        <a href="{{ route('profile-dosen.index') }}" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-backward"></i> Back</a>

                        {{-- <button type="button" class="btn btn-outline-danger btn-rounded mr-2" id="reset-button"><i class="fa-solid fa-arrows-rotate"></i></button> --}}
                        {{-- <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-floppy-disk"></i></button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="profile-image">
                        <div class="img">
                            <img id="image-preview" src="{{ asset('storage/images/profile/'. $user->image ) }}" alt="Photo Profile" class="card-img-top">
                            <input class="form-control mt-3" type="file" id="image" name="image" accept="image/*" disabled>
                        </div>
                        <hr>
                        <div class="form-group mt-2">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" disabled>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="phone">Nomor HP ( Whatsapp )</label>
                            <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" disabled>
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="email">Alamat Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" disabled>
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
                        <a href="{{ route('profile-dosen.index') }}" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-backward"></i> Back</a>
                        {{-- <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-floppy-disk"></i></button> --}}
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="form-group mt-2 col-lg-6 col-12">
                            <label for="user_placebirth">Tempat Lahir</label>
                            <input type="text" class="form-control @error('user_placebirth') is-invalid @enderror" name="user_placebirth" value="{{ $user->user_placebirth }}" disabled>
                            @error('user_placebirth') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group mt-2 col-lg-6 col-12">
                            <label for="user_datebirth">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('user_datebirth') is-invalid @enderror" name="user_datebirth" value="{{ $user->user_datebirth }}" disabled>
                            @error('user_datebirth') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group mt-2 col-lg-6 col-12">
                            <label for="user_typecard">Pilih Jenis Kartu Identitas</label>
                            <select name="user_typecard" id="user_typecard" class="form-select @error('user_typecard') is-invalid @enderror" disabled>
                                @if($user->user_typecard)
                                <option selected value="{{ $user->user_typecard }}">{{ $user->user_typecard }}</option>
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
                            <input type="text" class="form-control @error('user_idcard') is-invalid @enderror" name="user_idcard" value="{{ $user->user_idcard }}" disabled>
                            @error('user_idcard') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group mt-2 col-lg-6 col-12">
                            <label for="user_gender">Pilih Jenis Kelamin</label>
                            <select name="user_gender" id="user_gender" class="form-select @error('user_gender') is-invalid @enderror" disabled>
                                @if($user->user_gender)
                                <option selected value="{{ $user->user_gender }}">{{ $user->user_gender }}</option>
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
                            <select name="user_religion" id="user_religion" class="form-select @error('user_religion') is-invalid @enderror" disabled>
                                @if($user->user_religion)
                                <option selected value="{{ $user->user_religion }}">{{ $user->user_religion }}</option>
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
@endsection
