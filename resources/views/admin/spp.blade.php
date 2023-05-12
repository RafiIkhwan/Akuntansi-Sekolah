@extends('admin.index')
@section('title', 'SPP')
@section('konten')

<div class="m-auto shadow px-3 pt-3 rounded border">
    <div class="d-flex justify-content-between">
        <span class="d-flex h2">Tabel SPP</span>
        <div class="d-flex">
            <button id="fabtn" data-bs-toggle="modal" data-bs-target="#sppTambah" class="btn btn-primary py-2" ><i id="ibtn" class="fa-solid fa-plus"></i> Tambah Data SPP</button>
        </div>
    </div>
    <br>
    <div class="d-flex py-3 w-100 border-top">
        <form action="{{ route('sppCari') }}" method="get" class="d-flex w-100">
            <input class="form-control" name="cari" type="search" placeholder="Search" aria-label="Search" value="{{ old('cari') }}">
            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    @if (count($spps) > 0)
    <div class="table-responsive"> 
        <table class="table">
            <thead>
                <th>No</th>
                <th>Tahun Ajaran</th>
                <th>Biaya</th>
                <th class="text-center">Aksi</th>
            </thead>
            @foreach ($spps as $spp)
            <tbody style="font-size: 10pt;">
                <td>{{ $no++ }}</td>
                <td>{{ $spp->tahun_ajaran }}</td>
                <td>{{ $spp->biaya }}</td>
                <td class="text-center">
                    <a id="fabtn" class="btn text-light btn-warning m-1" data-bs-toggle="modal" data-bs-target="#sppEdit-{{ $spp->id_spp }}" href=''><i id="ibtn" class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <a id="fabtn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#sppHapus-{{ $spp->id_spp }}" href=''><i id="ibtn" class="fa-solid fa-trash"></i> Hapus</a>
                </td>
            </tbody>
            @endforeach
        </table>
    </div>
    {{ $spps->links() }}
    @else
    <p class="text-center">Tidak ada data tersedia</p><br>
    @endif
</div>

@include('components.spp.modal-spp')
@endsection