      
 @extends('layouts.admin-main')
 @section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Data Member</h3>
     
                </div>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Edit data User </p>
                  @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
                 <a href="{{ route('member.index') }}"><h6 class="bi bi-arrow-left-square"> Kembali</h6></a> 
                 <hr>
                  <div class="row">
                    <div class="col-md-12">
                      <form method="POST" action="{{ route('vaksin.update',$user['id'])}}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Username</label>
                          <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror" id="username" value="{{$user['username']}}">
                          @error('username')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email</label>
                          <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" value="{{$user['email']}}">
                          @error('email')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Alamat</label>
                          <input type="text" name="alamat" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" value="{{$user['alamat']}}">
                          @error('keterangan')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Telp</label>
                          <input type="text" name="telp" class="form-control  @error('telp') is-invalid @enderror" id="telp" value="{{$user['telp']}}">
                          @error('telp')
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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      @endsection