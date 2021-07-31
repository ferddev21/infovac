<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $title }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets_member/assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets_member/css/styles.css') }}" rel="stylesheet" />


</head>

<body>
    <!-- Responsive navbar-->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light border-bottom bg-white fixed-top shadow-sm"
        style="top: -100px">
        <div class="container px-lg-5">
            <a class="navbar-brand font-weight-500" href="#!">InfoVac <i class="bi bi-shield-fill-check"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Berkontribusi</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Login</a></li>
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
                <a href="http://" class="m-3 text-decoration-none text-dark">Tentang</a> •
                <a href="http://" class="m-3 text-decoration-none text-dark">Ketentuan</a> •
                <a href="https://vaksin.kemkes.go.id/" class="m-3 text-decoration-none text-dark">info KEMKES</a>
            </div>
            <p class="m-3 text-center text-black-50">Copyright &copy; Infovac.id 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('assets_member/js/scripts.js') }}"></script>
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
</body>

</html>
