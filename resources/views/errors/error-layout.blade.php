<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('code') | @yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets_member/assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets_member/css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center min-vh-100">
            <div class="d-flex align-items-center">
                <div class="d-flex flex-column text-center border shadow-sm text-dark p-5 m-3">
                    <h1 class="fw-bold display-1">Oops!</h1>
                    <p class="text-black-50 mt-3">(@yield('code')) @yield('message')</p>
                    <div class="mt-4">
                        <a href="{{ route('home') }}" class="btn btn-dark">
                            <i class="bi bi-arrow-left-short"></i>
                            Back home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
