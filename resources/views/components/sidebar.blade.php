<div id="sidebar" style="max-width: 150px;" class="mt-2 d-flex shadow-sm border rounded position-fixed mb-3">
    <div class="d-flex flex-column bg-body rounded">
        <nav class="p-3 navbar navbar-light">
            <ul class="navbar-nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link bg-body {{ request()->is('home') ? 'text-dark' : '' }}" href="{{ route('home') }}"><i class="fa-solid fa-table-cells"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-body {{ request()->is('pembayaran') || request()->is('pembayaran/cari') ? 'text-dark' : '' }}" href="{{ route('pembayaran') }}"><i class="fa-solid fa-money-bill"></i> Pembayaran</a>
                </li>
                @if (Auth::user()->role == 'Admin')
                <button class="btn p-1 mb-2 align-items-center rounded collapsed d-flex justify-content-start" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    <i class="fa-solid fa-chevron-down"></i>
                    Expand
                </button>
                <div class="collapse" id="dashboard-collapse">
                    <li class="nav-item">
                        <a class="nav-link bg-body {{ request()->is('petugas') || request()->is('petugas/cari') ? 'text-dark' : '' }}" href="{{ route('petugas') }}"><i class="fas fa-user"></i> Petugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-body {{ request()->is('siswa') || request()->is('siswa/cari') ? 'text-dark' : '' }}" href="{{ route('siswa') }}"><i class="fas fa-users"></i> Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-body {{ request()->is('kelas') || request()->is('kelas/cari') ? 'text-dark' : '' }}" href="{{ route('kelas') }}"><i class="fa-solid fa-house"></i> Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-body {{ request()->is('spp') || request()->is('spp/cari') ? 'text-dark' : '' }}" href="{{ route('spp') }}"><i class="fa-solid fa-money-check-dollar"></i> SPP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-body {{ request()->is('transaksi') || request()->is('transaksi/cari') ? 'text-dark' : '' }}" href="{{ route('transaksi') }}"><i class="fa-solid fa-money-bill-wave"></i> Transaksi</a>
                    </li>
                </div>
                @endif
            </ul>
        </nav>
    </div>
</div>