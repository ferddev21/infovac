      
 @extends('layouts.admin-main')
 @section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Data Vaksin</h3>
     
                </div>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Edit data Vaksins </p>
                  @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
                 <a href="{{ route('vaksin.index') }}"><h6 class="bi bi-arrow-left-square"> Kembali</h6></a> 
                 <hr>
                  <div class="row">
                    <div class="col-md-12">
                      <form method="POST" action="{{ route('vaksin.update',$vaksins['id'])}}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama Vaksin</label>
                          <input type="text" name="nama_vaksin" class="form-control  @error('nama_vaksins') is-invalid @enderror" id="nama_vaksin" value="{{$vaksins['nama_vaksin']}}">
                          @error('nama_vaksin')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Keterangan Vaksin</label>
                          <input type="text" name="keterangan" class="form-control  @error('keterangan') is-invalid @enderror" id="keterangan" value="{{$vaksins['keterangan']}}">
                          @error('keterangan')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                   
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      @endsection