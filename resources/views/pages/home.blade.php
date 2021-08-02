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
                        <a href="{{ route('register') }}" class="btn btn-light shadow text-black m-1">
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
            <div class="d-flex justify-content-center py-4 border p-3 flex-lg-row flex-column shadow-sm">
                <div class=" d-flex align-items-center">
                    <label for="Provinsi" class="form-label">Provinsi</label>
                    <select class="form-select form-select m-3" aria-label=".form-select-lg example" id="province">
                        <option selected>Pilih Provinsi ...</option>
                        @foreach ($province as $p)
                            <option value="{{ $p->id }}">
                                {{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class=" d-flex align-items-center">
                    <label for="Kabupaten" class="form-label">Kabupaten</label>
                    <select class="form-select form-select m-3" aria-label=".form-select-lg example" id="city">
                        <option selected>Pilih Kabupaten ...</option>
                    </select>
                </div>

                <div class=" d-flex align-items-center">
                    <label for="Kecamatan" class="form-label">Kecamatan</label>
                    <select class="form-select form-select m-3" aria-label=".form-select-lg example" id="district">
                        <option selected>Pilih Kecamatan ...</option>
                    </select>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-dark m-3 w-100">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>


        </div>
    </section>

    <!-- Page Content-->
    <section class="pt-5">
        <div class="container px-lg-5 ">
            <!-- Page Features-->
            <div class="row gx-lg-5">
                <div class="col-lg-6 col-xxl-4 mb-5 ">
                    <div class="card rounded-lg shadow-sm rounded-2">
                        <div class="card-body">
                            <a href="{{ route('detail.post', ['id' => 1]) }}" class="text-decoration-none text-dark">
                                <div class="d-flex justify-content-between mb-0">
                                    <p><i class="bi bi-award"></i> Sinovac Vaccion</p>

                                    <div>
                                        <span class="badge bg-dark p-2">5 Agt - 25 Agt</span>
                                    </div>
                                </div>
                                <h2 class="fw-bold">
                                    Vaksinasi lansia kota
                                    yogyakarta
                                </h2>
                                <p class="fw-light"><i class="bi bi-geo-alt-fill"></i> Jl. Waru [Rumah Sakit Nusa Indah]</p>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer...</p>
                            </a>
                            <hr>
                            <a href="" class="btn btn-outline-dark btn-sm" target="_blank">Daftar <i
                                    class="bi bi-arrow-right-short"></i></a>
                        </div>
                        <div class="card-footer bg-dark">
                            <small class="fst-italic text-white">Terakhir update 3 hari yang lalu</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
