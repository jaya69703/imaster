@extends('cms.cms-index')
@section('content')
    @include('cms.cms-alert')
    <form action="{{ route('usermanage.store') }}" method="POST" enctype="multipart/form-data">
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
                                <img id="image-preview" src="{{ asset('storage/images/profile/default.png' ) }}" alt="Photo Profile" class="card-img-top">
                                <input class="form-control mt-3" type="file" id="image" name="image" accept="image/*">
                            </div>
                            <hr>
                            <div class="form-group mt-2">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukkan nama lengkap pengguna ...">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="user_phone">Nomor HP ( Whatsapp )</label>
                                <input type="user_phone" class="form-control @error('user_phone') is-invalid @enderror" name="user_phone" placeholder="Masukkan nomor handphone pengguna ...">
                                @error('user_phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="email">Alamat Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukkan alamat email pengguna ...">
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
                            <a href="{{ route('usermanage.index') }}" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-backward"></i> Back</a>
                            <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-floppy-disk"></i></button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group mt-2">
                                <label for="position_id">Pilih Jabatan</label>
                                <select name="position_id" id="position_id" class="form-select @error('position_id') is-invalid @enderror" name="name">
                                    <option selected disabled>Silahkan Pilih Jabatan</option>
                                    @foreach ( $position as $item )
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('position_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2 col-lg-6 col-12">
                                <label for="user_placebirth">Tempat Lahir</label>
                                <input type="text" class="form-control @error('user_placebirth') is-invalid @enderror" name="user_placebirth" placeholder="Masukkan tempat lahir pengguna ...">
                                @error('user_placebirth') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2 col-lg-6 col-12">
                                <label for="user_datebirth">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('user_datebirth') is-invalid @enderror" name="user_datebirth" placeholder="Masukkan tanggal lahir pengguna ...">
                                @error('user_datebirth') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2 col-lg-6 col-12">
                                <label for="user_typecard">Pilih Jenis Kartu Identitas</label>
                                <select name="user_typecard" id="user_typecard" class="form-select @error('user_typecard') is-invalid @enderror" name="name">

                                    <option selected disabled>Silahkan Pilih Jenis Kartu Identitas</option>
                                    <option placeholder="KTP">KTP - Kartu Tanda Penduduk</option>
                                    <option placeholder="KP">KP - Kartu Pelajar</option>
                                    <option placeholder="SIM">SIM - Surat Izin Mengemudi</option>

                                </select>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2 col-lg-6 col-12">
                                <label for="user_idcard">Masukkan Nomor Kartu Identitas</label>
                                <input type="text" class="form-control @error('user_idcard') is-invalid @enderror" name="user_idcard" placeholder="Masukkan nomor identitas pengguna ...">
                                @error('user_idcard') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2 col-lg-6 col-12">
                                <label for="user_gender">Pilih Jenis Kelamin</label>
                                <select name="user_gender" id="user_gender" class="form-select @error('user_gender') is-invalid @enderror" name="name">
                                    <option selected disabled>Silahkan Pilih Jenis Kelamin</option>
                                    <option placeholder="Laki Laki">Laki Laki</option>
                                    <option placeholder="Perempuan">Perempuan</option>

                                </select>
                                @error('user_gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2 col-lg-6 col-12">
                                <label for="user_religion">Pilih Agama</label>
                                <select name="user_religion" id="user_religion" class="form-select @error('user_religion') is-invalid @enderror" name="name">

                                    <option selected disabled>Silahkan Pilih Agama Kamu</option>
                                    <option placeholder="Islam">Islam</option>
                                    <option placeholder="Kristen">Kristen</option>
                                    <option placeholder="Buddha">Buddha</option>
                                    <option placeholder="Hindu">Hindu</option>
                                    <option placeholder="Konghuchu">Konghuchu</option>

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
