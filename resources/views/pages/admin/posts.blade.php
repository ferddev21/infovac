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
                  <p class="card-title">Daftar List tempat Vaksin</p>

                  <div class="row">

                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Tempat Vaksin</th>
                              <th>Nama User</th>
                              <th>Jenis Vaksin</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          @foreach ($posts as $key => $p)


                          <tr>
                            <td>1</td>
                            <td>{{$p->nama_tempat}}</td>
                            <td>{{$p->user_id}}</td>
                            <td>{{$p->vaksin_id}}</td>
                            <td>{{$p->status}}</td>
                            <td>
                              <button class="btn btn-primary " type="submit"> Detail </button>
                            </td>
                          </tr>
                          @endforeach
                        </table>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5">
                      <span class="float-right"><br>{{ $posts->links() }}</span>
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