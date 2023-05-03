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