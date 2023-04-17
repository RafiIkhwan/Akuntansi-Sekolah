<div class="rounded shadow-sm bg-body border">
    <div class="py-2 px-3 bg-success text-light h6">
        Data Siswa
    </div>
    <div class="p-3">
        @foreach ($data_siswa as $siswa)
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th scope="row">NIS</th>
                        <td>: {{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <th scope="row">NISN</th>
                        <td>: {{ $siswa->nisn }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama Siswa</th>
                        <td>: {{ $siswa->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tahun Ajaran</th>
                        <td>: {{ $siswa->tahun_ajaran }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jurusan</th>
                        <td>: {{ $siswa->jurusan }}</td>
                    </tr>
                    <tr>
                        <th scope="row">No Hp</th>
                        <td>: {{ $siswa->hp }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Alamat</th>
                        <td>: {{ $siswa->alamat }}</td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
            </div>     
        @endforeach
    </div>
</div>
<br>

<div class="rounded shadow-sm bg-body border">
    <div class="d-flex justify-content-between py-2 px-3 bg-danger text-light h6">Tagihan
    <a class="d-flex align-items-center btn btn-primary btn-outline-light mx-3" data-bs-toggle="modal" data-bs-target="#transaksiTambah" href=''><i style="width: 16px; margin-inline-end: 5px;" class="fa-solid fa-plus"></i>Bayar</a>
    </div>
    <div class="table-responsive px-3">
        <table class="table table-striped">
            <thead class="h6">
                <tr>
                    <th>No</th>
                    <th>Nama Admin</th>
                    <th>Jenis SPP</th>
                    <th>Total Tagihan</th>
                    <th>Total Bayar</th>
                    <th>Kembali</th>
                    <th>Bulan</th>
                    <th>Status</th>
                    <th class="text-center">Detail</th>
                </tr>
            </thead>
            <tbody style="font-size: 10pt;">
                @foreach ($bulan as $b)
                    @php $transaksi = $data_transaksi->where('bulan', $b)->first() @endphp
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $transaksi ? $transaksi->admin->nama_admin : '-' }}</td>
                        <td>SPP Bulan {{ $b }}</td>
                        <td>{{ $siswa->spp->biaya }}</td>
                        <td>{{ $transaksi ? $siswa->transaksi->where('bulan', $b )->sum('total_bayar') : 0 }}</td>
                        <td>{{ $transaksi ? ($transaksi->where('bulan', $b)->sum('total_bayar') >= $transaksi->siswa->spp->biaya ? abs($siswa->transaksi->where('bulan', $b)->where('sisa_bayar', '<', 0)->sum('sisa_bayar')) : 0) : 0 }}</td>
                        <td>{{ $b }}</td>
                        <td class="text-center">
                            @if ($transaksi && $siswa->transaksi->where('bulan', $b)->sum('total_bayar') >= $transaksi->siswa->spp->biaya)
                                <p class="bg-success rounded text-light fw-bold py-1">LUNAS</p>
                            @else
                                <p class="bg-danger rounded text-light fw-bold py-1">BELUM LUNAS</p>
                            @endif
                        </td>
                        <td class="text-center">
                            <a data-bs-toggle="modal" data-bs-target="#transaksiDetail-{{ $transaksi ? $transaksi->id_transaksi : 'kosong' }}" href=''><i class="fa-solid fa-circle-info"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br>