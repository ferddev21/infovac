@extends('layouts.user-main')
@section('content')
    <!-- Header-->
    <header class="jumbotron jumbotron-fluid py-3 mb-3 CoverImage" style="background-color:black">
        <div class="container px-lg-5">
            <div class="row mb-2">
                <div class="col-lg-8 col-md-12 col-sm-12 text-white d-flex justify-content-center justify-content-lg-start">
                    <div class="d-flex flex-column text-sm-start text-center text-md-start">
                        <h1 class="display-1 text-shadow"><b>Berkontribusi</b></h1>
                        <p class="lead text-shadow">Upload info vaksinasi Covid-19</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center justify-content-lg-end">
                    <div class="d-flex align-items-center">
                        <a href="" class="btn btn-light shadow text-black m-1">Buat Postingan</a>
                        {{-- <a href="" class="btn btn-dark shadow text-white m-1">Login</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="pt-5 ">
        <div class="container px-lg-5">
            <div class="border py-5 p-3">
                <h3>Postingan saya</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tempat</th>
                                <th scope="col">Last</th>
                                <th scope="col" style="width: 10%">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td><a href="">Edit</a>
                                    <a href="">Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
