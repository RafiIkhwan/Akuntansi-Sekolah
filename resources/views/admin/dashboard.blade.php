@extends('admin.index')
@section('title', 'Dashboard')
@section('konten')

<div class="container">
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="/siswa" style="text-decoration: none;">
                <div class="card bg-primary">
                    <div class="card-header">
                        <h5 class="card-title text-white">Jumlah Siswa</h5>
                    </div>
                    <div class="card-body">
                        <h6 style="font-weight: 400;" class="card-text text-white"><span style="font-weight: 500; font-size: 25px;">{{ $data_siswa->count() }}</span> Siswa</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card bg-secondary">
                <div class="card-header">
                    <h5 class="card-title text-white">Jumlah Kelas</h5>
                </div>
                <div class="card-body">
                    <h6 style="font-weight: 400;" class="card-text text-white"><span style="font-weight: 500; font-size: 25px;">{{ $data_kelas->count() }}</span> Kelas</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card bg-danger">
                <div class="card-header">
                    <h5 class="card-title text-white">Total Transaksi Bulan Ini</h5>
                </div>
                <div class="card-body">
                    <h6 style="font-weight: 400;" class="card-text text-white"><span style="font-weight: 500; font-size: 25px;">{{ $data_transaksi->count() }}</span> Transaksi</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card bg-warning">
                <div class="card-header">
                    <h5 class="card-title text-white">Belum Lunas</h5>
                </div>
                <div class="card-body">
                    <h6 style="font-weight: 400;" class="card-text text-white"><span style="font-weight: 500; font-size: 25px;">{{ $transaksi->count()  }}</span> Siswa</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card bg-success">
                <div class="card-header">
                    <h5 class="card-title text-white">Total Saldo</h5>
                </div>
                <div class="card-body">
                    <h6 style="font-weight: 400;" class="card-text text-white"><span style="font-weight: 500; font-size: 25px;">Rp. {{ $total }}</span>,00</h6>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection