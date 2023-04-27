<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Akuntansi Sekolah | @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
        <link rel="icon" href="{{ asset('image/favicon.ico') }}">
    </head>

    {{-- <body class="d-flex flex-column min-vh-100"> --}}
        <body>
        <div class="">
            <div class="col-md-12">
                <div class="position-fixed container-fluid px-3 pt-3 bg-body" style="margin-top: -10px;"> 
                    <nav class="navbar navbar-expand-lg navbar-light pb-0">
                        <div class="container-fluid py-2 px-4 shadow-sm rounded border bg-body">
                            <a class="navbar-brand" href="{{ route('home') }}"><b>Akuntansi</b></a>
                            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button> --}}
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                  <img src="https://github.com/rafiikhwan.png" alt="Foto Profile" width="32" height="32" class="rounded-circle me-2">
                                  <strong>{{ Auth::user()->nama_admin }}</strong>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    {{-- <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#petugasEdit-{{ Auth::id() == $admin->idpetugas }}" class="btn btn-primary py-2" ><i class="fa-regular fa-user"></i> Edit Profile</a></li> --}}
                                    <li><a class="dropdown-item" href="{{ route('logoutaksi') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div><br><br><br>
                {{-- <div class="bg-body position-fixed w-100" style="top: 72px; height: 6px;"></div> --}}
                <div class="d-flex flex-row mx-3">
                    <div style="max-width: 150px; min-height: 85%;" class="mt-2 d-flex shadow-sm border rounded position-fixed mb-3">
                        <div class="d-flex flex-column bg-body rounded">
                            <nav class="p-3 navbar navbar-light">
                                <ul class="navbar-nav flex-column mb-auto">
                                    <li class="nav-item">
                                        <a class="nav-link bg-body {{ request()->is('home') ? 'text-dark' : '' }}" href="{{ route('home') }}"><i class="fa-solid fa-table-cells"></i> Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-body {{ request()->is('pembayaran') ? 'text-dark' : '' }}" href="{{ route('pembayaran') }}"><i class="fa-solid fa-money-bill"></i> Pembayaran</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-body {{ request()->is('petugas') ? 'text-dark' : '' }}" href="#"><i class="fas fa-user"></i> Petugas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-body {{ request()->is('siswa') ? 'text-dark' : '' }}" href="{{ route('siswa') }}"><i class="fas fa-users"></i> Siswa</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-body {{ request()->is('kelas') ? 'text-dark' : '' }}" href="{{ route('kelas') }}"><i class="fa-solid fa-house"></i> Kelas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-body {{ request()->is('transaksi') ? 'text-dark' : '' }}" href="{{ route('transaksi') }}"><i class="fa-solid fa-money-bill-wave"></i> Transaksi</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div id="content" style="margin-left: 160px; margin-top: 20px; width: 100%;">
                        <div class="mb-2 mx-3">
                            <div class="mb-3">
                                <a class="text-dark h5" style="text-decoration: none;" href="{{ route('home') }}">Dashboard</a><br>
                                <a style="text-decoration: none; font-weight: 400;" class="text-dark h6" href="{{ route('home') }}">Dashboard > <a style="text-decoration: none; font-weight: 400;" class="text-dark h6" href="">{{ ucfirst(Route::getCurrentRoute()->getName()) }}</a> </a>
                            </div>
                            <span>
                                @if (session()->has('success'))
                                    <div class="alert alert-info position-static">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session()->has('edit'))
                                    <div class="alert alert-warning position-static">
                                        {{ session('edit') }}
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                <div class="alert alert-danger position-static">
                                    {{ session('error') }}
                                </div>
                                @endif
                            </span>
                        </div>
                        
                        @yield('konten')

                    </div>
                </div>
            </div>
        </div>
{{-- 
        @include('admin.modalProfile')
@endif
@endforeach --}}

        {{-- <footer class="container-fluid rounded bg-body shadow p-3 mt-auto border text-center">
            <h5>Copyright @2023 Rafi Ikhwan</h5>
        </footer> --}}
        <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    </body>
</html>