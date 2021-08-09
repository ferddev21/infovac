@extends('layouts.user-main')
@section('content')
    <section class="">
        <div class="container px-lg-5">
            <div class="row border shadow-sm m-2 mt-4 p-4">

                <div class="d-flex justify-content-between">
                    <h4 class="">
                        <i class="bi bi-layout-text-sidebar-reverse"></i> Postingan ku
                    </h4>
                    <div>
                        <button type="button" class="btn rounded-0" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <span class="bi bi-filter-right"></span> Filter/Sort
                        </button>
                    </div>
                </div>

                <div class="collapse" id="collapseExample">
                    <div class="card card-body mt-3">
                        <form action="{{ route('member.post.index') }}" method="get">
                            <div class="d-flex justify-content-center flex-lg-row flex-column">
                                <div class=" d-flex align-items-center">
                                    <label for="sort" class="form-label">Urutkan</label>
                                    <select class="form-select form-select m-3" aria-label=".form-select-lg example"
                                        id="sort" name="sort">
                                        <option value="" {{ $sort == '' ? 'selected' : '' }}>--</option>
                                        <option value="desc" {{ $sort == 'desc' ? 'selected' : '' }}> Post Terbaru
                                        </option>
                                        <option value="asc" {{ $sort == 'asc' ? 'selected' : '' }}>Post Terlama</option>
                                    </select>
                                </div>
                                <div class=" d-flex align-items-center">
                                    <label for="filter" class="form-label">Status</label>
                                    <select class="form-select form-select m-3" aria-label=".form-select-lg example"
                                        id="filter" name="filter">
                                        <option value="" {{ $filter == '' ? 'selected' : '' }}>--</option>
                                        <option value="active" {{ $filter == 'active' ? 'selected' : '' }}>Posting
                                            (active)</option>
                                        <option value="inactive" {{ $filter == 'inactive' ? 'selected' : '' }}>On Hold
                                            (inactive)</option>
                                    </select>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-dark m-3 w-100">
                                        Result
                                    </button>
                                </div>
                                <div class="d-flex align-items-center text-center">
                                    <a href="{{ route('member.post.index') }}"
                                        class="btn btn-outline-secondary m-3 w-100">
                                        Reset
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-block">
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
                                            @if ($post->status == 'active')
                                                <span class="badge bg-success p-2 mb-3">Posting</span>
                                            @else
                                                <span class="badge bg-warning p-2 mb-3">On Hold</span>
                                            @endif

                                            <div class="nav-item dropdown m-0">
                                                <a class="nav-link text-capitalize p-0 text-dark" id="navbarDropdown"
                                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="bi-three-dots-vertical"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end  animate slideIn"
                                                    aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" target="_blank"
                                                        href="{{ route('post.view', ['id' => hashids($post->id, 'encode')]) }}">View</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('member.post.edit', ['id' => hashids($post->id, 'encode')]) }}">Edit</a>
                                                    <a href="#" class="dropdown-item text-danger"
                                                        onclick="deleteConfirmation({{ $post->id }})">Delete</a>
                                                </div>

                                            </div>
                                        </div>

                                        <a href="{{ route('member.post.edit', ['id' => hashids($post->id, 'encode')]) }}"
                                            class="text-decoration-none text-dark">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="d-flex justify-content-center mb-3 h-100">
                                                        <img src="{{ asset('file_images/posts/' . $post->image_post) }}"
                                                            alt="{{ $post->image_post }}"
                                                            class="img-thumbnail rounded-2">
                                                    </div>
                                                </div>

                                                <div class="col-md-8 col-sm-12">
                                                    <h3 class="fw-bold text-truncate" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="{{ $post->nama_tempat }}">
                                                        {{ $post->nama_tempat }}
                                                    </h3>

                                                    <div class="text-truncate-container ">
                                                        <div class="card-text w-100 h-100">
                                                            <?= $post->keterangan_tempat ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="card-footer bg-dark">
                                        <small class="fst-italic text-white">
                                            Created at {{ carbon($post->created_at)->format('d M Y, h:i') }}
                                        </small>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
