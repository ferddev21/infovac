@extends('layouts.user-main')
@section('content')
    <section class="">
        <div class="container px-lg-5">
            <div class="row border shadow-sm m-2 mt-4 p-4">

                <h4 class="">
                    <i class="bi bi-layout-text-sidebar-reverse"></i> Postingan ku
                </h4>

                <div class="row mt-3">
                    <div class="col-lg-6 col-xxl-4 mb-4">
                        <a href="{{ route('member.post.add') }}" class="text-decoration-none text-dark">
                            <div class="card h-100 bg-light" style="border-style: dashed;">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <i class="bi bi-plus " style="font-size: 5rem;"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    @foreach ($posts as $post)
                        <div class="col-lg-6 col-xxl-4 mb-4">
                            <div class="card rounded-lg shadow-sm rounded-2">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-0">
                                        <span class="badge bg-success p-2 mb-3">Posting</span>
                                        <div class="nav-item dropdown m-0">
                                            <a class="nav-link text-capitalize p-0 text-dark" id="navbarDropdown" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <span class="bi-three-dots-vertical"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end  animate slideIn"
                                                aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="">View</a>
                                                <a class="dropdown-item" href="">Edit</a>
                                                <a class="dropdown-item text-danger" href="">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="d-flex justify-content-center mb-3 h-100">
                                                <img src="{{ asset('file_images/posts/' . $post->image_post) }}" alt=""
                                                    class="img-thumbnail rounded-2">
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12">
                                            <h3 class="fw-bold">
                                                {{ $post->nama_tempat }}
                                            </h3>

                                            <div class="text-truncate-container ">
                                                <div class="card-text w-100 h-100">
                                                    <?= $post->keterangan_tempat ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer bg-dark">
                                    <small class="fst-italic text-white">Terakhir posting 3 hari yang lalu</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
