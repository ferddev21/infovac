@extends('layouts.user-main')
@section('content')
<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card shadow-sm rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h1 class="text-center fw-light">InfoVac <i class="bi bi-shield-fill-check"></i></h1>
            <hr>
            <h5 class="card-title text-center mb-3 fw-light fs-5">Sign In</h5>
            <form>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address or Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
            
              <div class="d-grid">
                <button class="btn btn-dark btn-login text-uppercase" type="submit">Sign
                  in</button>
              </div>
          
              <hr class="my-4">
              <div class="d-grid mb-2">
                <button class="btn btn-google btn-login text-uppercase " type="submit">
                    <i class="bi bi-google"> </i>   Sign in with Google
                </button>
              </div>
            </form>

              <p class="text-center mt-5">Tidak punya akun ? <a href="http://" class="text-dark">Daftar</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection