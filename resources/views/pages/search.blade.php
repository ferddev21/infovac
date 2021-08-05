@extends('layouts.user-main')
@section('content')
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
            <h1></h1>
            <!-- Page Features-->
            <div class="row gx-lg-5 mb-5">
                @if (empty($posts->toArray()))
                    <div class="d-flex justify-content-center h-50 p-5">
                        <div class="d-flex flex-column bd-highlight text-center">
                            <span class="bi bi-emoji-frown" style="font-size: 5rem"></span>
                            <h3>Pencarian tidak ditemukan</h3>
                            <p>Ikut berkontribusi tempat vaksinasi COVID-19 di kota anda</p>
                            <a href="{{ !Auth::user() ? route('register') : route('member.post.index') }}"
                                class="btn btn-outline-dark w-50 align-self-center">Berkontribusi</a>
                        </div>
                    </div>
                @else
                    @foreach ($posts as $post)
                        <div class="col-lg-6 col-xxl-4 mb-5 ">
                            <div class="card rounded-lg shadow-sm rounded-2">
                                <div class="card-body">
                                    <a href="{{ route('post.view', hashids($post->id, 'encode')) }}"
                                        class="text-decoration-none text-dark">
                                        <div class="d-flex justify-content-between mb-0">
                                            <p><i class="bi bi-award "></i> {{ $post->vaksin->nama_vaksin }}</p>

                                            <div>
                                                <span class="badge bg-dark p-2">
                                                    {{ carbon($post->tgl_mulai)->toFormattedDateString() }}
                                                    -
                                                    {{ carbon($post->tgl_selesai)->toFormattedDateString() }}
                                                </span>
                                            </div>
                                        </div>
                                        <h2 class="fw-bold text-truncate">
                                            {{ $post->nama_tempat }}
                                        </h2>
                                        <p class="fw-light text-capitalize">
                                            <i class="bi bi-geo-alt-fill"></i>
                                            {{ fullAddress($post->alamat, $post->district->name, $post->citie->name, $post->province->name) }}
                                        </p>
                                        <div class="text-truncate-container ">
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
                @endif
            </div>
        </div>
    </section>
@endsection
