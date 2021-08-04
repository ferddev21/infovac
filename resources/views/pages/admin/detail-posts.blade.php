      @extends('layouts.admin-main')
      @section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Data Posts</h3>
                  <h6 class="font-weight-normal mb-0">Data lokasi vaksin yang sudah di inputkan oleh user</h6>
                </div>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Detail tempat Vaksin {{$posts->nama_tempat}}</p>
                  <a href="{{ route('posts.index') }}"><h6 class="bi bi-arrow-left-square"> Kembali</h6></a> 
                  <hr>

                  <div class="row">
                    <form method="POST" action="{{ route('posts.update',$posts['id'])}}">
                      @csrf

                    <div class="col-12">
                      <img class="img-thumbnail m-3 mt-0 mb-0" src="{{ asset('file_images/posts/.1628008822_04161d10d5af763a70ed4e557bd8f6b6.jpg') }}"
                      alt="">

                   
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label"><b>Nama Tempat : </b> {{$posts['nama_tempat']}}</label>

                         
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label"><b>Nama User Pengirim : </b> {{$posts->user->nama}}</label>
                        
                         
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label"><b>Nama Vaksin : </b> {{$posts->vaksin->nama_vaksin}}</label>
                          
                    
                       
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label"><b>Nama Tempat : </b>{{$posts['nama_tempat']}}</label>
                    
                         
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label"><b>Alamat : </b> {{$posts['alamat']}}</label>

                         
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label"><b>Tempat : </b>  {{$posts['keterangan_tempat']}} </label>
                         
                         
                        </div>
                        <div class="mb-3">             
                          <label for="exampleInputEmail1"  class="form-label"><b>Mulai : </b>  {{$posts['tgl_mulai']}} </label>

                         
                        </div>       
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label"><b>Akhir : </b>  {{$posts['tgl_akhir']}}</label>
                      
                       
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label"><b>Pendaftaran : </b>  {{$posts['link_pendaftaran']}}</label>
                       
                         
                        </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><b>Status</b></label>
                      <select name="status" id="status">
                        <option value="{{$posts->status}}">{{$posts->status}}</option>
                        <option value="active">active</option>
                        <option value="inactive">inactive</option>
                      </select>
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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>

    
      @endsection