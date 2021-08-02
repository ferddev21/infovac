@extends('layouts.user-main')
@section('content')

    <section class="pb-3 pt-3">
        <div class="container px-lg-5">
            <div class="row py-4 border p-3 shadow-sm m-2">
                <h4 class=""><i class="bi bi-layout-text-sidebar-reverse"></i> Post baru</h4>
                <form action="{{ route('member.post.create') }}" method="POST" class="mt-3" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control  @error('nama_tempat') is-invalid @enderror" id="nama_tempat"
                            placeholder="nama_tempat" name="nama_tempat" value="{{ old('nama_tempat') }}">
                        <label for="nama_tempat">Nama Tempat Vaksinasi</label>
                        @error('nama_tempat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select @error('vaksin') is-invalid @enderror"
                            aria-label="Floating label select " name="vaksin" id="vaksin">
                            <option value="" selected>Pilih Vaksin ... </option>
                            @foreach ($vaksins as $vaksin)
                                <option value="{{ $vaksin->id }}" {{ old('vaksin') == $vaksin->id ? 'selected' : '' }}>
                                    {{ $vaksin->nama_vaksin }}
                                </option>
                            @endforeach
                        </select>
                        <label for="vaksin">Vaksin</label>
                        @error('vaksin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select  @error('province') is-invalid @enderror"
                                        aria-label="Floating label select example" name="province" id="province">
                                        <option value="">Pilih Provinsi ... </option>
                                        @foreach ($provinces as $prov)
                                            <option value="{{ $prov->id }}"
                                                {{ old('province') == $prov->id ? 'selected' : '' }}>
                                                {{ $prov->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="province">Provinsi</label>
                                    @error('province')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select  @error('city') is-invalid @enderror"
                                        aria-label="Floating label select example" name="city" id="city">
                                        <option value="">Pilih Kabupaten ...</option>
                                    </select>
                                    <label for="city">Kabupaten</label>
                                    @error('city')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select  @error('district') is-invalid @enderror"
                                        aria-label="Floating label select example" name="district" id="district">
                                        <option value="">Pilih Kecamatan ...</option>
                                    </select>
                                    <label for="district">Kacamatan</label>
                                    @error('district')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control  @error('alamat') is-invalid @enderror" placeholder="alamat"
                            id="alamat" name="alamat" value="{{ old('alamat') }}"
                            style="height: 100px">{{ old('alamat') }}</textarea>
                        <label for="alamat">Alamat</label>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating ">
                                    <input type="text"
                                        class="form-control datepic  @error('tgl_mulai') is-invalid @enderror" id="from"
                                        placeholder="tgl_mulai" name="tgl_mulai" value="{{ old('tgl_mulai') }}">
                                    <label for="tgl_mulai">Mulai dari</label>
                                    @error('tgl_mulai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control  @error('tgl_selesai') is-invalid @enderror"
                                        id="to" placeholder="tgl_selesai" name="tgl_selesai"
                                        value="{{ old('tgl_selesai') }}">
                                    <label for="tgl_selesai">Sampai dengan</label>
                                    @error('tgl_selesai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="url" class="form-control  @error('link') is-invalid @enderror" id="link"
                            placeholder="link" name="link" value="{{ old('link') }}">
                        <label for="link">Link Pendaftaran</label>
                        @error('link')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <small class="fw-light">Format : <i>https://urlkamu</i> </small>
                    </div>

                    <div class="mb-3">
                        <input type="file" class="form-control form-control-lg @error('image') is-invalid @enderror"
                            id="image" placeholder="image" name="image" value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <small class="fw-light">Poster format : <i>*.jpg,*.jpeg,*png</i> | max : 2 MB</small>
                    </div>

                    <div class="form-group form-floating mb-3">
                        <textarea class="ckeditor form-control rounded-3 @error('keterangan') is-invalid @enderror"
                            name="keterangan"></textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4 d-flex justify-content-md-center">
                        <button class="btn btn-dark w-25" type="submit">
                            Posting
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
