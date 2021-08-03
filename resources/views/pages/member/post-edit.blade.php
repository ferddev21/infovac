@extends('layouts.user-main')
@section('content')

    <section class="pb-3 pt-3">
        <div class="container px-lg-5">
            <div class="row py-4 border p-3 shadow-sm m-2">
                <a href="{{ route('member.post.index') }}" class="btn btn-outline-dark mb-2 btn-sm w-auto"><i
                        class="bi bi-arrow-left-short"></i> Kembali</a>
                <hr>
                <h4><i class="bi bi-layout-text-sidebar-reverse"></i> {{ $post->nama_tempat }}</h4>
                <p>Terakhir update : {{ carbon($post->updated_at)->format('d M Y, H:i') }}</p>
                <form action="{{ route('member.post.update') }}" method="POST" class="mt-2" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    <input type="hidden" value="{{ $post->id }}" name="id">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control  @error('nama_tempat') is-invalid @enderror" id="nama_tempat"
                            placeholder="nama_tempat" name="nama_tempat" value="{{ $post->nama_tempat }}">
                        <label for="nama_tempat">Tempat Vaksinasi</label>
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
                                <option value="{{ $vaksin->id }}"
                                    {{ $post->vaksin->id == $vaksin->id ? 'selected' : '' }}>
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
                                        <option value=""> </option>
                                        @foreach ($provinces as $prov)
                                            <option value="{{ $prov->id }}"
                                                {{ $post->provinces_id == $prov->id ? 'selected' : '' }}>
                                                {{ $prov->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="province">Provinsi</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select  @error('city') is-invalid @enderror"
                                        aria-label="Floating label select example" name="city" id="city">
                                        <option value=""> </option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ $post->cities_id == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="city">Kabupaten</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select  @error('district') is-invalid @enderror"
                                        aria-label="Floating label select example" name="district" id="district">
                                        <option value=""> </option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}"
                                                {{ $post->districts_id == $district->id ? 'selected' : '' }}>
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
                            id="alamat" name="alamat" value="{{ $post->alamat }}"
                            style="height: 100px">{{ $post->alamat }}</textarea>
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
                                        placeholder="tgl_mulai" name="tgl_mulai"
                                        value="{{ carbon($post->tgl_mulai)->format('d M Y') }}">
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
                                        value="{{ carbon($post->tgl_akhir)->format('d M Y') }}">
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
                            placeholder="link" name="link" value="{{ $post->link_pendaftaran }}">
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
                        <small class="fw-light">Abaikan jika tidak ada perubahan poster, Poster format :
                            <i>*.jpg,*.jpeg,*png</i> |
                            max : 2 MB</small>
                    </div>

                    <div class="form-group form-floating mb-3">
                        <textarea class="ckeditor form-control rounded-3 @error('keterangan') is-invalid @enderror"
                            name="keterangan">{{ $post->keterangan_tempat }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="status" name="status"
                            {{ $post->status == 'active' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">
                            Status Posting
                        </label>
                    </div>
                    <div class="mt-4 d-flex justify-content-md-center">
                        <button class="btn btn-dark w-25" type="submit">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
