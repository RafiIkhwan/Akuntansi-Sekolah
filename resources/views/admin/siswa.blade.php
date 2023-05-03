@extends('admin.index')
@section('title', 'Siswa')
@section('konten')

<div class="m-auto shadow px-3 pt-3 rounded border">
    <div class="d-flex justify-content-between">
        <span class="d-flex h2">Tabel Siswa</span>
        <div class="d-flex">
            <button id="fabtn" data-bs-toggle="modal" data-bs-target="#siswaTambah" class="btn btn-primary py-2" ><i id="ibtn" class="fa-solid fa-plus"></i> Tambah Data Siswa</button>
        </div>
    </div>
    <br>
    <div class="d-flex py-3 w-100 border-top">
        <form action="/siswa/cari" method="get" class="d-flex w-100">
            <input class="form-control" name="cari" type="search" placeholder="Search" aria-label="Search" value="{{ old('cari') }}">
            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="table-responsive"> 
        <table class="table">
            <thead>
                <th>No</th>
                <th>NIS</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Tahun Ajaran</th>
                <th>Jurusan</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Aksi</th>
            </thead>
            @foreach ($data_siswa as $siswa)
            <tbody style="font-size: 10pt;">
                <td>{{ $no++ }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nisn }}</td>
                <td>{{ $siswa->nama_siswa }}</td>
                <td>{{ $siswa->spp->tahun_ajaran }}</td>
                <td>{{ $siswa->kelas->kompetensi_keahlian }}</td>
                <td>{{ $siswa->kelas->nama_kelas }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>{{ $siswa->hp }}</td>
                <td class="text-center">
                    <a id="fabtn" class="btn text-light btn-warning m-1" data-bs-toggle="modal" data-bs-target="#siswaEdit-{{ $siswa->id_siswa }}" href=''><i id="ibtn" class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <a id="fabtn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#siswaHapus-{{ $siswa->id_siswa }}" href=''><i id="ibtn" class="fa-solid fa-trash"></i> Hapus</a>
                </td>
            </tbody>
            @endforeach
        </table>
    </div>
    {{ $data_siswa->links() }}
</div>


@include('components.siswa.modal-siswa')
    
@endsection