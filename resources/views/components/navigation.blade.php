<div class="position-fixed container-fluid px-3 pt-3 bg-body" style="margin-top: -10px;"> 
    <nav class="navbar navbar-expand-lg navbar-light pb-0">
        <div class="container-fluid py-2 px-4 shadow-sm rounded border bg-body">
            <div class="d-flex flex-row align-items-center">
                <a class="navbar-brand" href="{{ route('home') }}"><b>Akuntansi</b></a>
                {{-- <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none"id="dropdowndata" data-bs-toggle="dropdown" aria-expanded="false">Halodek</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="dropdown-item">a</li>
                    </ul>
                </div> --}}
                <div id="topNav" class="d-flex flex-row align-items-center">
                    <ul class="navbar-nav flex-row mb-auto">
                        <li class="nav-item px-1">
                            <a class="nav-link bg-body {{ request()->is('pembayaran') || request()->is('pembayaran/cari') ? 'text-dark' : '' }}" href="{{ route('pembayaran') }}">Pembayaran</a>
                        </li>
                        @if (Auth::user()->role == 'Admin')
                        <li class="nav-item px-1">
                            <a class="nav-link bg-body {{ request()->is('petugas') || request()->is('petugas/cari') ? 'text-dark' : '' }}" href="{{ route('petugas') }}">Petugas</a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link bg-body {{ request()->is('siswa') || request()->is('siswa/cari') ? 'text-dark' : '' }}" href="{{ route('siswa') }}">Siswa</a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link bg-body {{ request()->is('kelas') || request()->is('kelas/cari') ? 'text-dark' : '' }}" href="{{ route('kelas') }}">Kelas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-body {{ request()->is('spp') ? 'text-dark' : '' }}" href="{{ route('spp') }}">SPP</a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link bg-body {{ request()->is('transaksi') ? 'text-dark' : '' }}" href="{{ route('transaksi') }}">Transaksi</a>
                        </li>
                        @endif
                    </ul>
                    <div id="profileNew" class="dropdown">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="https://github.com/rafiikhwan.png" alt="Foto Profile" width="32" height="32" class="rounded-circle me-2">
                          {{-- <strong>{{ Auth::user()->nama_admin }}</strong> --}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{-- <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#petugasEdit-{{ Auth::id() == $admin->idpetugas }}" class="btn btn-primary py-2" ><i class="fa-regular fa-user"></i> Edit Profile</a></li> --}}
                            <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fa-solid fa-user"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('logoutaksi') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                        </ul>
                    </div> 
                </div>
            </div>
            <div id="profile" class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://github.com/rafiikhwan.png" alt="Foto Profile" width="32" height="32" class="rounded-circle me-2">
                  <strong>{{ Auth::user()->nama_admin }}</strong>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('logoutaksi') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                </ul>
            </div> 
        </div>
    </nav>
</div>
