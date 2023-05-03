@foreach($data_siswa as $siswa)
<div class="absolute">
    <div class="modal fade" id="siswaHapus-{{ $siswa->id_siswa }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-danger modal-title" id="Label">Hapus Data Siswa</h5>
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