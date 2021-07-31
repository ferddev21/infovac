@extends('layouts.user-main')
@section('content')
       <!-- Page Content-->
    <section class="mb-3 mt-3">
        <div class="container px-lg-5">
            <!-- Page Features-->
            <div class="card border-0">
                <div class="card-header bg-white d-flex justify-content-between m-3 p-0">
                      <a href="{{ url()->previous(); }}" class="btn btn-outline-dark mb-2 btn-sm"><i class="bi bi-arrow-left-short"></i></a>
                      <small class="fst-italic text-dark-50 mt-3">Admin yanto - 30 Agt 2021, 18:30</small>
                </div>
                 <img class="img-thumbnail m-3 mt-0 mb-0" src="https://www.pkubantul.com/wp-content/uploads/2021/01/Instagram-1-2021-sosialisasi-300x300.jpg" alt="">
                <div class="card-body">
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
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo enim vitae maiores animi ducimus
                         maxime officiis omnis accusantium optio. Dolorem porro itaque dignissimos amet cupiditate quaerat architecto aliquid
                          tempora voluptate.This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer</p>
                    <a href="" class="btn btn-outline-dark" target="_blank">Daftar <i class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </div>
    </section>
@endsection
