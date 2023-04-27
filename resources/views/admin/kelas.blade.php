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
        <form action="/kelas/cari" method="get" class="d-flex w-100">
            <input class="form-control" name="cari" type="search" placeholder="Search" aria-label="Search" value="{{ old('cari') }}" required>
            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
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
</div>
<br>

<div class="absolute">
    <div class="modal fade" id="kelasTambah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="Label">Tambah Data Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kelasStore') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mt-1">
                        <label class="my-1" for="kelas">Nama Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas">
                    </div>
                    <div class="form-group mt-1">
                        <label class="my-1" for="kk">Nama Kompetensi Keahlian</label>
                        <input type="text" class="form-control" id="kk" name="kk">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


@foreach($data_kelas as $kelas)
<div class="absolute">
    <div class="modal fade" id="kelasEdit-{{ $kelas->id_kelas }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-warning modal-title" id="Label">Edit Data Kelas</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="kelas/update/{{ $kelas->id_kelas }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mt-1">
                        <label class="my-1" for="kelas">Nama Kelas</label>
                        <input class="form-control" name="kelas" id="kelas" value="{{ $kelas->nama_kelas }}">
                    </div>
                    <div class="form-group mt-1">
                        <label class="my-1" for="kk">Nama Kompetensi Keahlian</label>
                        <input class="form-control" name="kk" id="kk" value="{{ $kelas->kompetensi_keahlian }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($data_kelas as $kelas)
<div class="absolute">
    <div class="modal fade" id="kelasHapus-{{ $kelas->id_kelas }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-danger modal-title" id="Label">Hapus Kelas</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('kelasDelete', $kelas->id_kelas ) }}" method="post">
                @csrf
                <div class="modal-body">
                    <span>Yakin ingin menghapus data Kelas <b>{{ $kelas->nama_kelas }}</b> ?</span>
                    <br><br>
                    <span class="bg-danger text-light px-2 py-1 w-100">Anda juga akan kehilangan data-data dibawah</span>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>NIS</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Tahun Ajaran</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                            </thead>
                            @foreach($kelas->siswa as $siswa)
                            <tbody style="font-size: 10pt;">
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nisn }}</td>
                                <td>{{ $siswa->nama_siswa }}</td>
                                <td>{{ $siswa->tahun_ajaran }}</td>
                                <td>{{ $siswa->jurusan }}</td>
                                <td>{{ $siswa->kelas->nama_kelas }}</td>
                                <td>{{ $siswa->alamat }}</td>
                                <td>{{ $siswa->hp }}</td>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection