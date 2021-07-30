@extends('layouts.user-main')
@section('content')
<!-- Header-->
    <header class="jumbotron jumbotron-fluid py-5 mb-3 CoverImage"
        style="background-image:url({{ $imageCover }})"
    >
        <div class="container px-lg-5">
            <div class="row">
                <div class="col-8 text-white">
                <h1 class="display-5">Info Vaksin</h1>
                <p class="lead">Layanan menemukan info tempat vaksinasi terdekat</p> 
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <div class="d-flex align-items-center">
                        <a href="http://" class="btn btn-light shadow">Berkontribusi</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
<!-- Page Content-->
<section class="pt-5">
    <div class="container px-lg-5">
        <!-- Page Features-->
        <div class="row gx-lg-5">
            <div class="col-lg-6 col-xxl-4 mb-5">
                 <div class="card">
                    <img class="" src="https://pkukotagede.co.id/wp-content/uploads/2021/03/WhatsApp-Image-2021-03-08-at-08.20.08-450x709.jpeg" alt="Card image cap" 
                        style="max-height: 400px">
                    <div class="card-body">
                        <h5 class="card-title">Vaksinasi lansia</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection