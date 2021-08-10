@extends('layouts.user-main')
@section('content')
    <!-- Page Content-->
    <section class="mb-3 mt-3">
        <div class="container px-lg-5">
            <!-- Page Features-->
            <div class="card border-0">
                <div class="card-header bg-white d-flex justify-content-between m-3 p-0">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-dark mb-2 btn-sm"><i
                            class="bi bi-arrow-left-short"></i> Kembali
                    </a>
                    <small class="fst-italic text-dark-50 mt-3">
                        <span class="text-capitalize">{{ $post->user->nama }}</span>
                        -
                        {{ carbon($post->created_at)->diffForHumans() }}</small>
                </div>
                <img class="img-thumbnail m-3 mt-0 mb-0" src="{{ asset('file_images/posts/' . $post->image_post) }}"
                    alt="{{ $post->image_post }}">
                <div class="card-body">
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
                    <h2 class="fw-bold">
                        {{ $post->nama_tempat }}
                    </h2>
                    <p class="fw-light"><i class="bi bi-geo-alt-fill"></i>
                        {{ fullAddress($post->alamat, $post->district->name, $post->citie->name, $post->province->name) }}
                    </p>

                    <div class="card-text">
                        <?= $post->keterangan_tempat ?>
                    </div>

                    <a href="{{ $post->link_pendaftaran }}" class="btn btn-outline-dark" target="_blank">
                        Daftar <i class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </div>
    </section>
@endsection
