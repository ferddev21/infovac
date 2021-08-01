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

                    <div class="col-12">
                      <form method="POST" action="{{ route('vaksin.update',$posts['id'])}}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama Tempat</label>
                          <input type="text" name="nama_tempat" class="form-control  @error('nama_tempat') is-invalid @enderror" id="nama_tempat" value="{{$posts['nama_tempat']}}">
                          @error('username')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama User Pengirim</label>
                          <input type="text" name="user_id" class="form-control  @error('user_id') is-invalid @enderror" id="user_id" value="{{$posts['user_id']}}. {{$posts->user->nama}}">
                          @error('user_id')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama Vaksin</label>
                          <input type="text" name="vaksin_id" class="form-control  @error('vaksin_id') is-invalid @enderror" id="vaksin_id" value="{{$posts['vaksin_id']}}. {{$posts->vaksin->nama_vaksin}}">
                          @error('vaksin_id')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama Tempat</label>
                          <input type="text" name="nama_tempat" class="form-control  @error('nama_tempat') is-invalid @enderror" id="nama_tempat" value="{{$posts['nama_tempat']}}">
                          @error('nama_tempat')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Alamat</label>
                          <input type="text" name="alamat" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" value="{{$posts['alamat']}}">
                          @error('alamat')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Keterangan Tempat</label>
                          <input type="text" name="keterangan_tempat" class="form-control  @error('keterangan_tempat') is-invalid @enderror" id="keterangan_tempat" value="{{$posts['keterangan_tempat']}}">
                          @error('keterangan_tempat')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tanggal Mulai</label>
                          <input type="text" name="tgl_mulai" class="form-control  @error('tgl_mulai') is-invalid @enderror" id="tgl_mulai" value="{{$posts['tgl_mulai']}}">
                          @error('tgl_mulai')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>       
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tanggal Akhir</label>
                          <input type="text" name="tgl_akhir" class="form-control  @error('tgl_akhir') is-invalid @enderror" id="tgl_akhir" value="{{$posts['tgl_akhir']}}">
                          @error('tgl_akhir')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Link Pendaftaran</label>
                          <input type="text" name="link_pendaftaran" class="form-control  @error('link_pendaftaran') is-invalid @enderror" id="link_pendaftaran" value="{{$posts['link_pendaftaran']}}">
                          @error('link_pendaftaran')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                      <select name="status" id="status">
                        <option value="">Pilih status</option>
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