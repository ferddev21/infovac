@extends('layouts.user-main')
@section('content')
    <section class="pt-3">
        <div class="container px-lg-5">
            <div class="row py-4 border p-3 m-2 shadow-sm">
                <h4 class=""><i class="bi bi-person-square"></i> Akun profile</h4>
                <form action="{{ route('member.account.update') }}" method="POST" class="mt-3">
                    @csrf



                    <input type="hidden" value="{{ $user->id }}" name="id">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama"
                            placeholder="nama lengkap" name="nama" value="{{ $user->nama }}">
                        <label for="nama">Nama Lengkap</label>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username"
                            placeholder="username" name="username" value="{{ $user->username }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control  @error('telphone') is-invalid @enderror" id="floatingInput"
                            placeholder="telphone" name="telphone" value="{{ $user->telp }}">
                        <label for="floatingInput">Nomor Telphone</label>
                        @error('telphone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="floatingInput"
                            placeholder="email" name="email" value="{{ $user->email }}">
                        <label for="floatingInput">Alamat Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Floating label select example" name="province"
                                        id="province">
                                        <option value=""> </option>
                                        @foreach ($provinces as $prov)
                                            <option value="{{ $prov->id }}"
                                                {{ $user->provinces_id == $prov->id ? 'selected' : '' }}>
                                                {{ $prov->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="province">Provinsi</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Floating label select example" name="city"
                                        id="city">
                                        <option value=""> </option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ $user->cities_id == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="city">Kabupaten</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Floating label select example" name="district"
                                        id="district">
                                        <option value=""> </option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}"
                                                {{ $user->districts_id == $district->id ? 'selected' : '' }}>
                                                {{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="district">Kacamatan</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control  @error('alamat') is-invalid @enderror" placeholder="alamat"
                            id="alamat" name="alamat" value="{{ $user->alamat }}"
                            style="height: 200px">{{ $user->alamat }}</textarea>
                        <label for="alamat">Alamat</label>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4 d-flex justify-content-center">
                        <button class="btn btn-dark w-25" type="submit">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="pb-3 pt-2">
        <div class="container px-lg-5">
            <div class="row py-4 border p-3 shadow-sm m-2">
                <h4 class=""><i class="bi bi-shield-lock-fill"></i> Ganti password</h4>
                <form action="{{ route('member.account.update_password') }}" method="POST" class="mt-3">
                    @csrf

                    <input type="hidden" value="{{ $user->id }}" name="id">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control  @error('password_lama') is-invalid @enderror"
                            id="password_lama" placeholder="password_lama" name="password_lama"
                            value="{{ old('password_lama') }}">
                        <label for="password_lama">Password Sekarang</label>
                        @error('password_lama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control  @error('password_baru') is-invalid @enderror"
                            id="password_baru" placeholder="password_baru" name="password_baru"
                            value="{{ old('password_baru') }}">
                        <label for="password_baru">Password Baru</label>
                        @error('password_baru')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4 d-flex justify-content-center">
                        <button class="btn btn-dark w-25" type="submit">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
