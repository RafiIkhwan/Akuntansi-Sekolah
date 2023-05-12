@extends('admin.index')
@section('title', 'Kelas')
@section('konten')

<div class="m-auto shadow px-3 pt-3 rounded border">
    <div class="d-flex justify-content-between">
        <span class="d-flex h2">Tabel Kelas</span>
        <div class="d-flex">
            <button id="fabtn" data-bs-toggle="modal" data-bs-target="#kelasTambah" class="btn btn-primary py-2" ><i id="ibtn" class="fa-solid fa-plus"></i> Tambah Data Kelas</button>
        </div>
    </div>
    <br>
    <div class="d-flex py-3 w-100 border-top">
        <form action={{ route('kelasCari') }}  method="get" class="d-flex w-100">
            <input class="form-control" name="cari" type="search" placeholder="Search" aria-label="Search" value="{{ old('cari') }}" required>
            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    @if (count($data_kelas) > 0)
    <table class="table table-responsive">
        <thead>
            <th>No</th>
            <th>Kelas</th>
            <th>Kompetensi Keahlian</th>
            <th class="text-center">Aksi</th>
        </thead>
        @foreach($data_kelas as $kelas)
        <tbody>
            <td>{{ $no++ }}</td>
            <td>{{ $kelas->nama_kelas }}</td>
            <td>{{ $kelas->kompetensi_keahlian }}</td>
            <td class="text-center">
                <a id="fabtn" class="btn text-light btn-warning m-1" data-bs-toggle="modal" data-bs-target="#kelasEdit-{{ $kelas->id_kelas }}" href=''><i id="ibtn" class="fa-solid fa-pen-to-square"></i> Edit</a>
                <a id="fabtn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#kelasHapus-{{ $kelas->id_kelas }}" href=''"><i id="ibtn" class="fa-solid fa-trash"></i> Hapus</a>
            </td>
        </tbody>
        @endforeach
    </table>
    {{ $data_kelas->links() }}
    @else
    <p class="text-center">Tidak ada data tersedia</p><br>
    @endif
</div>
<br>

@include('components.kelas.modal-kelas')
@endsection