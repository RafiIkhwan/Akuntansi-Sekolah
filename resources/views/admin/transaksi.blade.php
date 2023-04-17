@extends('admin.index')
@section('title', 'Data Transaksi')
@section('konten')

    <div class="m-auto shadow px-3 pt-3 rounded border">
        <div class="d-flex justify-content-between">
            <span class="d-flex h2">Tabel Transaksi</span>
            <div class="d-flex">
                <button id="fabtn" data-bs-toggle="modal" data-bs-target="#transaksiTambah" class="btn btn-primary py-2" ><i id="ibtn" class="fa-solid fa-plus"></i> Tambah Data Transaksi</button>
            </div>
        </div>
        <br>
        <div class="d-flex py-3 w-100 border-top">
            <form action="/transaksi/cari" method="get" class="d-flex w-100">
                <input class="form-control" name="cari" type="search" placeholder="Search" aria-label="Search" value="{{ old('cari') }}">
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="table-responsive"> 
            <table class="table">
                <thead>
                    <td>No</td>
                    <td>Nama Siswa</td>
                    <td>Admin</td>
                    <td>Tanggal</td>
                    <td>Total Bayar</td>
                    <td>Sisa Bayar</td>
                    <td>Kembali</td>
                    <td>Bulan</td>
                    <td class="text-center">Aksi</td>
                </thead>
                @foreach ($data_transaksi as $transaksi)
                <tbody style="font-size: 10pt;">
                    <td>{{ $no++ }}</td>
                    <td>{{ $transaksi->siswa->nama_siswa }}</td>
                    <td>{{ $transaksi->admin->nama_admin }}</td>
                    <td>{{ $transaksi->tanggal }}</td>
                    <td>{{ $transaksi->total_bayar }}</td>
                    <td>
                        @if ($transaksi->sisa_bayar <= 0)
                        <b>LUNAS</b>
                        @elseif ($transaksi->sisa_bayar > 0)  
                        {{ $transaksi->sisa_bayar }}
                        @endif
                    </td>    
                    <td>
                        @if ($transaksi->sisa_bayar < 0)
                        {{ abs($transaksi->sisa_bayar) }}
                        @elseif ($transaksi->kembali == NULL)
                            <i>NULL</i>
                        @endif
                    </td>
                    <td>{{ $transaksi->bulan }}</td>
                    <td class="text-center">
                        <a id="fabtn" class="btn text-light btn-warning m-1" data-bs-toggle="modal" data-bs-target="#transaksiEdit-{{ $transaksi->id_transaksi }}" href=''><i id="ibtn" class="fa-solid fa-pen-to-square"></i>Edit</a>
                        <a id="fabtn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#transaksiHapus-{{ $transaksi->id_transaksi }}" href=''><i id="ibtn" class="fa-solid fa-trash"></i>Hapus</a>
                    </td>
                </tbody>
                @endforeach
            </table>
        </div>
        {{ $data_transaksi->links() }}
    </div>

@endsection