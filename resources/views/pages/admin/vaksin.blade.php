      
 @extends('layouts.admin-main')
 @section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Data Vaksin</h3>
                  <h6 class="font-weight-normal mb-0">Vaksin Yang Tersedia Saat ini </h6>
                </div>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Daftar List Vaksin</p>
                  <button class="btn btn-primary">Tambah Data </button>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Vaksin</th>
                              <th>Keterangan Vaksin</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tr>
                              <td>1</td>
                              <td>Sinovak</td>
                              <td>Buatan Cina</td>
                       <td>      <button class="btn btn-danger bi bi-trash" type="submit"></button>
                        <button class="btn btn-primary bi bi-pencil-square" type="submit"></button>
                    </td>
                          </tr>
                          
                      </table>
                      </div>
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