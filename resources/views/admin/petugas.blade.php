@extends('admin.index')
@section('title', 'Petugas')
@section('konten')


<div class="m-auto shadow px-3 pt-3 rounded border">
    <div class="d-flex justify-content-between">
        <span class="d-flex h2">Tabel Petugas</span>
        <div class="d-flex">
            <button id="fabtn" data-bs-toggle="modal" data-bs-target="#loginTambah" class="btn btn-primary py-2" ><i id="ibtn" class="fa-solid fa-plus"></i> Tambah Data Petugas</button>
        </div>
    </div>
    <br>
    <div class="d-flex py-3 w-100 border-top">
        <form action="{{ route('petugasCari') }}" method="get" class="d-flex w-100">
            <input class="form-control" name="cari" type="search" placeholder="Search" aria-label="Search" value="{{ old('cari') }}">
            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    @if (count($data_petugas) > 0)
    <div class="table-responsive"> 
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama Admin</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-center">Aksi</th>
            </thead>
            @foreach ($data_petugas as $petugas)
            <tbody style="font-size: 10pt;">
                <td>{{ $no++ }}</td>
                <td>{{ $petugas->nama_admin }}</td>
                <td>{{ $petugas->email }}</td>
                <td>{{ $petugas->role }}</td>
                @if(Auth::id() == $petugas->id_admin)
                <td class="text-center">
                    <a id="fabtn" class="btn text-light btn-warning m-1" href='{{ route('profile') }}'><i id="ibtn" class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <a id="fabtn" class="btn btn-danger" href='{{ route('profile') }}'><i id="ibtn" class="fa-solid fa-trash"></i> Hapus</a>
                </td>
                @else
                <td class="text-center">
                    <button id="fabtn" class="btn text-light btn-warning m-1" @disabled(true) href=''><i id="ibtn" class="fa-solid fa-pen-to-square"></i> Edit</button>
                    <button id="fabtn" class="btn btn-danger" @disabled(true) href=''><i id="ibtn" class="fa-solid fa-trash"></i> Hapus</button>
                </td>
                @endif
            </tbody>
            @endforeach
        </table>
    </div>
    {{ $data_petugas->links() }}
    @else
    <p class="text-center">Tidak ada data tersedia</p><br>
    @endif
</div>

@include('components.petugas.modal-petugas')

@endsection