@extends('layouts.user-main')
@section('content')
    <!-- Header-->
    <header class="jumbotron jumbotron-fluid py-3 mb-3 CoverImage" style="background-image:url({{ $imageCover }})">
        <div class="container px-lg-5">
            <div class="row mb-2">
                <div class="col-lg-8 col-md-12 col-sm-12 text-white d-flex justify-content-center justify-content-lg-start">
                    <div class="d-flex flex-column text-sm-start text-center text-md-start">
                        <h1 class="display-1 text-shadow"><b>Info Vaksin</b></h1>
                        <p class="lead text-shadow">Pusat informasi vaksinasi COVID-19 terdekat</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center justify-content-lg-end">
                    <div class="d-flex align-items-center">
                        <a href="{{ !Auth::user() ? route('register') : route('member.post.index') }}"
                            class="btn btn-light shadow text-black m-1">
                            Berkontribusi info vaksin
                        </a>
                        {{-- <a href="" class="btn btn-dark shadow text-white m-1">Login</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </header>


    <section class="pt-5" id="search">
        <div class="container px-lg-5">
            <form action="{{ route('search') }}" method="get">
                <div class="d-flex justify-content-center py-4 border p-3 flex-lg-row flex-column shadow-sm">
                    <div class=" d-flex align-items-center">
                        <label for="Provinsi" class="form-label">Provinsi</label>
                        <select class="form-select form-select m-3" aria-label=".form-select-lg example" id="province"
                            name="prov">
                            <option value="" selected>Pilih Provinsi ...</option>
                            @foreach ($province as $p)
                                <option value="{{ $p->id }}">
                                    {{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class=" d-flex align-items-center">
                        <label for="Kabupaten" class="form-label">Kabupaten</label>
                        <select class="form-select form-select m-3" aria-label=".form-select-lg example" id="city"
                            name="city">
                            <option value="" selected>Pilih Kabupaten ...</option>
                        </select>
                    </div>

                    <div class=" d-flex align-items-center">
                        <label for="Kecamatan" class="form-label">Kecamatan</label>
                        <select class="form-select form-select m-3" aria-label=".form-select-lg example" id="district"
                            name="district">
                            <option value="" selected>Pilih Kecamatan ...</option>
                        </select>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-dark m-3 w-100">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Page Content-->
    <section class="pt-5">
        <div class="container px-lg-5 ">
            <!-- Page Features-->
            <div class="row gx-lg-5">
                @foreach ($posts as $post)
                    <div class="col-lg-6 col-xxl-4 mb-5 ">
                        <div class="card rounded-lg shadow-sm rounded-2">
                            <div class="card-body">
                                <a href="{{ route('post.view', hashids($post->id, 'encode')) }}"
                                    class="text-decoration-none text-dark">
                                    <div class="d-flex justify-content-between mb-0">
                                        <p><i class="bi bi-award"></i> {{ $post->vaksin->nama_vaksin }}</p>

                                        <div>
                                            <span class="badge bg-dark p-2">
                                                {{ carbon($post->tgl_mulai)->toFormattedDateString() }}
                                                -
                                                {{ carbon($post->tgl_akhir)->toFormattedDateString() }}
                                            </span>
                                        </div>
                                    </div>
                                    <h2 class="fw-bold text-truncate" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="{{ $post->nama_tempat }}">
                                        {{ $post->nama_tempat }}
                                    </h2>
                                    <div class="text-truncate-container2 mb-3" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom"
                                        title=" {{ fullAddress($post->alamat, $post->district->name, $post->citie->name, $post->province->name) }}">
                                        <div class="fw-light text-capitalize">
                                            <i class="bi bi-geo-alt-fill"></i>
                                            {{ fullAddress($post->alamat, $post->district->name, $post->citie->name, $post->province->name) }}
                                        </div>
                                    </div>

                                    <div class="text-truncate-container">
                                        <div class="card-text w-100 h-100">
                                            <?= $post->keterangan_tempat ?>
                                        </div>
                                    </div>
                                </a>
                                <hr>
                                <a href="{{ $post->link_pendaftaran }}" class="btn btn-outline-dark btn-sm"
                                    target="_blank">Daftar <i class="bi bi-arrow-right-short"></i></a>
                            </div>
                            <div class="card-footer bg-dark">
                                <small class="fst-italic text-white">
                                    <span class="text-capitalize">{{ $post->user->nama }}</span> •
                                    {{ carbon($post->updated_at)->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
