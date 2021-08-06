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
                      <img class="img-thumbnail m-3 mt-0 mb-0" src="{{ asset('file_images/posts/' . $posts->image_post) }}"
                      alt="">
                      <hr>
                      <p class="card-title">Dikskripsi</p>
                   
                      <table class="table">
                    
                          <tr>
                       
                            <th style="width:12%">Nama Tempat</th>
                            <td style="width:1%"> : </td>
                            <td>{{$posts['nama_tempat']}}</td>
                          </tr>
                          <tr>    
                            <th style="width:12%">Nama User Pengirim</th>
                            <td style="width:1%"> : </td>
                            <td>{{$posts->user->nama}}</td>
                          </tr>
                          <tr>    
                            <th style="width:12%">Nama Vaksin</th>
                            <td style="width:1%"> : </td>
                            <td>{{$posts->vaksin->nama_vaksin}}</td>
                          </tr>
                          <tr>    
                            <th style="width:12%">Alamat</th>
                            <td style="width:1%"> : </td>
                            <td>{{$posts->alamat}}</td>
                          </tr>
                          <tr>    
                            <th style="width:12%">Provinsi</th>
                            <td style="width:1%"> : </td>
                            <td>{{$posts->province->name}}</td>
                          </tr>
                          <tr>    
                            <th style="width:12%">Kabupaten</th>
                            <td style="width:1%"> : </td>
                            <td>{{$posts->citie->name}}</td>
                          </tr>
                          <tr>    
                            <th style="width:12%">Kecamatan</th>
                            <td style="width:1%"> : </td>
                            <td>{{$posts->district->name}}</td>
                          </tr>
                          <tr>    
                            <th style="width:12%">Keterangan Tempat</th>
                            <td style="width:1%"> : </td>
                            <td>{!! $posts->keterangan_tempat !!}</td>
                          </tr>
                          <tr>    
                            <th style="width:12%">Tanggal Mulai</th>
                            <td style="width:1%"> : </td>
                            <td>{{ carbon($posts->tgl_mulai)->toFormattedDateString() }}</td>
                          </tr>
                          <tr>    
                            <th style="width:12%">Tanggal Akhir</th>
                            <td style="width:1%"> : </td>
                            <td>{{ carbon($posts->tgl_akhir)->toFormattedDateString() }}</td>
                          </tr>
                          <tr>    
                            <th style="width:12%">Link Pendaftaran Akhir</th>
                            <td style="width:1%"> : </td>
                            <td>{{$posts->link_pendaftaran}}</td>
                          </tr>
                          <tr>    
                            <th style="width:12%">Status</th>
                            <td style="width:1%"> : </td>
                            <td>  <select name="status" id="status">
                              <option value="{{$posts->status}}">{{$posts->status}}</option>
                              <option value="active">active</option>
                              <option value="inactive">inactive</option>
                            </select></td>
                          </tr>
                          <tr>    
                      
                            <td> <button type="submit" class="btn btn-primary">Submit</button>
                            </form> </td>
                          
                          </tr>


                
                     
                      </table>
                     
                   
                   
                        
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