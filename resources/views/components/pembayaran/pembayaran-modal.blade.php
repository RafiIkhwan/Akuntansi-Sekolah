<div class="absolute">
    <div class="modal fade" id="transaksiTambah" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="Label">Tambah Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @foreach ($data_siswa as $siswa)
                <form action="{{ route('transaksiStore') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input class="form-control" type="hidden" name="idsiswa" id="idsiswa" value="{{ $siswa->id_siswa }}" readonly>
                        <input class="form-control" type="hidden" name="idadmin" id="idadmin" value="{{ Auth::user()->id_admin }}" readonly>
                        <div class="form-group">
                            <label class="my-1" for="nmsiswa">Nama Siswa</label>
                            <input class="form-control" type="text" name="nmsiswa" id="nmsiswa" placeholder="{{ $siswa->nama_siswa }}" readonly>
                        </div>
                        <div class="form-group mt-1">
                            <label class="my-1" for="tanggal">Tanggal</label>
                            <input class="form-control" type="date" name="tanggal" id="tanggal" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="form-group mt-1">
                            <label class="my-1" for="totalbayar">Total Bayar</label>
                            <input class="form-control" type="number" name="totalbayar" id="totalbayar" required>
                        </div>
                        <div class="form-group mt-1">
                            <label class="my-1" for="bulan">Bulan</label>
                            <select class="form-control" type="text" name="bulan" id="bulan" required>
                                <option @disabled(true)>Pilih Bulan</option>
                                @foreach ($bulan as $nama_bulan)
                                    @php
                                        $total = $siswa->transaksi->where('bulan', $nama_bulan)->sum('total_bayar');
                                    @endphp
                                    @if ($total < 150000)
                                        <option value="{{ $nama_bulan }}">{{ $nama_bulan }}</option>
                                    @endif
                                @endforeach
                            </select>
                                                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>


@foreach ($data_transaksi as $transaksi)
<div class="absolute">
    <div class="modal fade" id="transaksiDetail-{{ $transaksi->id_transaksi }}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="Label">Detail Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @foreach ($data_siswa as $siswa)
                <form action="{{ route('transaksiHapus') }}" method="post">
                {{ csrf_field() }}
                <input class="" type="hidden" name="idsiswa" id="idsiswa" value="{{ $siswa->id_siswa }}" readonly>
                <input class="" type="hidden" name="idadmin" id="idadmin" value="{{ Auth::user()->id_admin }}" readonly>
                <input class="" type="hidden" name="oldbulan" id="oldbulan" value="{{ $transaksi->bulan }}" readonly>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th scope="row">Nama Siswa</th>
                            <td>: {{ $transaksi->siswa->nama_siswa }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Admin</th>
                            <td>: {{ $transaksi->admin->nama_admin }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal</th>
                            <td>: {{ $transaksi->tanggal }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Bayar</th>
                            <td>: {{ $siswa->transaksi->where('bulan', $transaksi->bulan )->sum('total_bayar') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Bulan</th>
                            <td>: {{ $transaksi->bulan }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <div class="d-flex w-100 justify-content-between">
                        <button type="button" class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#transaksiEdit-{{ $transaksi->id_transaksi }}" href=''>Edit</button>
                        <div class="d-flex">
                            <button class="btn btn-danger" type="submit" onclick="alert('Yakin ingin menghapus data bulan {{ $transaksi->bulan }}')" href=''>Hapus</button>
                        </div>
                    </div>
                </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($data_transaksi as $transaksi)
<div class="absolute">
    <div class="modal fade" id="transaksiEdit-{{ $transaksi->id_transaksi }}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-body px-1" data-bs-dismiss="modal"  aria-label="Close"><i class="fa-solid fa-arrow-left"></i></button>
                    <h5 class="modal-title text-warning" id="Label">Edit Data Transaksi</h5>
                    <p class="text-light" style="font-size: 0px;">-</p>
                </div>
                @foreach ($data_siswa as $siswa)
                <form action="{{ route('transaksiUpdate') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="" type="hidden" name="idsiswa" id="idsiswa" value="{{ $siswa->id_siswa }}" readonly>
                            <input class="" type="hidden" name="idadmin" id="idadmin" value="{{ Auth::user()->id_admin }}" readonly>
                            <input class="" type="hidden" name="oldbulan" id="oldbulan" value="{{ $transaksi->bulan }}" readonly>
                            <label class="my-1" for="nsiswa">Nama Siswa</label>
                            <input class="form-control" type="text" name="nsiswa" id="nsiswa" value="{{ $siswa->nama_siswa }}" readonly>       
                        </div>
                        <div class="form-group mt-1">
                            <label class="my-1" for="tanggal">Tanggal</label>
                            <input class="form-control" type="date" name="tanggal" id="tanggal" value="{{ $transaksi->tanggal }}" required>
                        </div>
                        <div class="form-group mt-1">
                            <label class="my-1" for="totalbayar">Total Bayar</label>
                            <input class="form-control" type="number" name="totalbayar" id="totalbayar" value="{{ $siswa->transaksi->where('bulan', $transaksi->bulan )->sum('total_bayar') }}" readonly>
                        </div>
                        <div class="form-group mt-1">
                            <label class="my-1" for="bulan">Bulan</label>
                            <select class="form-control" type="text" name="bulan" id="bulan" required>
                                <option @disabled(true)>Pilih Bulan</option>
                                @foreach ($bulan as $nama_bulan)
                                @if (!in_array($nama_bulan, array_column($data_transaksi->toArray(), 'bulan')))
                                <option value="{{ $nama_bulan }}">{{ $nama_bulan }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" href=''>Close</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="absolute">
    <div class="modal fade" id="transaksiDetail-kosong" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Data kosong
                </div>
                <div class="modal-body">
                    <div class="">
                        Data Belum Ada
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
        