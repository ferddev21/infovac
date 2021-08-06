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
                  <a href="{{ route('vaksin.tambah') }}">
                    <h6 class="bi bi-arrow-right-square"> Tambah Vaksin</h6>
                  </a>
                  @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
                  <hr>
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
                          @foreach ($vaksins as $key => $v)


                          <tr>
                            <td>{{$vaksins->firstItem() + $key}}</td>
                            <td>{{$v->nama_vaksin}}</td>
                            <td>{!! $v->keterangan !!}</td>
                            <td>
        
                              <a href="{{route('vaksin.delete',$v->id)}}" class="btn btn-danger bi bi-trash"></a>  
                          <a href="{{route('vaksin.edit',$v->id)}}" class="btn btn-primary bi bi-pencil-square"></a>  

                            </td>
                          </tr>
                          @endforeach
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5">
                      <span class="float-right"><br>{{ $vaksins->links() }}</span>
                    </div>
                  </div>
                </div>
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
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
        </div>
      </footer>
      <!-- partial -->
      </div>
      @endsection