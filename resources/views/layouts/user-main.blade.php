<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets_member/assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets_member/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>

<body>
    <!-- Responsive navbar-->
    <nav id="navbar"
        class="navbar navbar-expand-lg navbar-light border-bottom bg-white  {{ Request::url() == route('home') ? 'fixed-top' : '' }}"
        style="
        {{ Request::url() == route('home') ? 'top: -100px' : '' }}">
        <div class="container px-lg-5">
            <a class="navbar-brand font-weight-500" href="{{ route('home') }}">InfoVac <i
                    class="bi bi-shield-fill-check"></i></a>
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ Request::url() == route('home') ? 'active' : '' }} "
                            aria-current="page" href="{{ route('home') }}">Home
                        </a>
                    </li>
                    @if (Auth::user())

                        <li class="nav-item dropdown">
                            <a class="nav-link text-capitalize {{ Request::segment(1) == 'member' ? 'active' : '' }}"
                                id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                {{ Auth::user()->username }} </a>
                            <div class="dropdown-menu dropdown-menu-end  animate slideIn"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{ Request::url() == route('member.post.index') ? 'active' : '' }}"
                                    href="{{ route('member.post.index') }}">Postinganku</a>
                                <a class="dropdown-item {{ Request::url() == route('member.account') ? 'active' : '' }}"
                                    href="{{ route('member.account') }}">Akun</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ Request::url() == route('register') ? 'active' : '' }}"
                                href="{{ route('register') }}">Berkontribusi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::url() == route('login') ? 'active' : '' }}"
                                href="{{ route('login') }}">Login
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="min-vh-100">
        @yield('content')
    </div>
    <!-- Footer-->
    <footer class="py-3 border-top">
        <div class="container">
            <div class="text-center">
                <a href="" class="m-3 text-decoration-none text-dark">Tentang</a> •
                <a href="" class="m-3 text-decoration-none text-dark">Ketentuan</a> •
                <a href="https://vaksin.kemkes.go.id/" class="m-3 text-decoration-none text-dark">info KEMKES</a>
            </div>
            <p class="m-3 text-center text-black-50">Copyright &copy; Infovac.id 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('assets_member/js/scripts.js') }}"></script>
    @if (Request::url() == route('home'))
        <script>
            // When the user scrolls down 20px from the top of the document, slide down the navbar
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                    document.getElementById("navbar").style.top = "0";
                } else {
                    document.getElementById("navbar").style.top = "-500px";
                }
            }
        </script>
    @endif
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    {!! Toastr::message() !!}
    <script defer>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#province').on('change', function() {
                $.ajax({
                    url: '{{ route('address.city') }}',
                    method: 'POST',
                    data: {
                        id: $(this).val()
                    },
                    success: function(response) {
                        $('#city').empty();
                        $.each(response, function(id, name) {
                            $('#city').append(new Option(name, id))
                        })
                    }
                });

                $.ajax({
                    url: '{{ route('address.district') }}',
                    method: 'POST',
                    data: {
                        id: $(this).val()
                    },
                    success: function(response) {
                        $('#district').empty();
                        $.each(response, function(id, name) {
                            $('#district').append(new Option(name, id))
                        })
                    }
                });

            });

            $("#city").on('change', function() {
                $.ajax({
                    url: '{{ route('address.district') }}',
                    method: 'POST',
                    data: {
                        id: $(this).val()
                    },
                    success: function(response) {
                        $('#district').empty();
                        $.each(response, function(id, name) {
                            $('#district').append(new Option(name, id))
                        })
                    }
                })
            });


        });
    </script>
</body>

</html>
