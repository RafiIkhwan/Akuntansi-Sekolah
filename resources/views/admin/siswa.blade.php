@extends('admin.index')
@section('title', 'Data Siswa')
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

<div class="absolute">
    <div class="modal fade" id="siswaTambah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="Label">Tambah Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('siswaStore') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mt-1">
                        <label class="my-1" for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" required>
                    </div>
                    <div class="form-group mt-1">
                        <label class="my-1" for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" required>
                    </div>
                    <div class="form-group mt-1">
                        <label class="my-1" for="namasiswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="namasiswa" name="namasiswa" required>
                    </div>
                    <div class="form-group mt-1">
                        <label class="my-1" for="idspp">Tahun Ajaran</label>
                        <select class="form-control" name="idspp" id="idspp" required>
                            <option value="" @disabled(true)>Tahun Ajaran</option>
                            @foreach ($data_spp as $spp)
                                <option value="{{ $spp->id_spp }}">{{ $spp->tahun_ajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-1">
                        <label class="my-1" for="kelas">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas" required>
                            <option value="" @disabled(true)>Nama Kelas</option>
                            @foreach ($data_kelas as $kelas)
                                <option value="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-1">
                        <label for="alamat" class="my-1">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="10" rows="4"></textarea>
                    </div>
                    <div class="form-group mt-1">
                        <label for="nohp" class="my-1">No Hp</label>
                        <input class="form-control" type="text" id="nohp" name="nohp" required>
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


@foreach($data_siswa as $siswa)
<div class="absolute">
    <div class="modal fade" id="siswaEdit-{{ $siswa->id_siswa }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-warning modal-title" id="Label">Edit Data siswa</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="siswa/update/{{ $siswa->id_siswa }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mt-1">
                        <label class="my-1" for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" value="{{ $siswa->nis }}" required>
                    </div>
                    <div class="form-group mt-1">
                        <label class="my-1" for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $siswa->nisn }}" required>
                    </div>
                    <div class="form-group mt-1">
                        <label class="my-1" for="namasiswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="namasiswa" name="namasiswa" value="{{ $siswa->nama_siswa }}" required>
                    </div>
                    <div class="form-group mt-1">
                        <label class="my-1" for="idspp">Tahun Ajaran</label>
                        <select class="form-control" name="idspp" id="idspp">
                            <option value="" @disabled(true)>Tahun Ajaran</option>
                            @foreach ($data_spp as $spp)
                                <option value="{{ $spp->id_spp }}">{{ $spp->tahun_ajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-1">
                        <label class="my-1" for="kelas">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                            <option value="" @disabled(true)>Nama Kelas</option>
                            @foreach ($data_kelas as $kelas)
                                <option value="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-1">
                        <label for="alamat" class="my-1">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="10" rows="4">{{ $siswa->alamat }}</textarea>
                    </div>
                    <div class="form-group mt-1">
                        <label for="nohp" class="my-1">No Hp</label>
                        <input class="form-control" type="text" id="nohp" name="nohp" value="{{ $siswa->hp }}" required>
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

@foreach($data_siswa as $siswa)
<div class="absolute">
    <div class="modal fade" id="siswaHapus-{{ $siswa->id_siswa }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-danger modal-title" id="Label">Hapus siswa</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('siswaDelete', $siswa->id_siswa ) }}" method="post">
                @csrf
                <div class="modal-body">
                    <span>Yakin ingin menghapus data siswa <b>{{ $siswa->nama_siswa }}</b> ?</span>
                    <br><br>
                    <span class="bg-danger text-light px-2 py-1 w-100">Anda juga akan kehilangan data-data dibawah</span>
                    <br><br>
                    <div class="table-responsive"> 
                        <table class="table">
                            <thead>
                                <td>Nama Siswa</td>
                                <td>Admin</td>
                                <td>Tanggal</td>
                                <td>Total Bayar</td>
                                <td>Sisa Bayar</td>
                                <td>Kembali</td>
                                <td>Bulan</td>
                            </thead>
                            @foreach ($siswa->transaksi as $transaksi)
                            <tbody style="font-size: 10pt;">
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