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
                    @if (count($siswa->transaksi) > 0)
                    <span class="bg-danger text-light px-2 py-1 w-100">Anda juga akan kehilangan data-data dibawah</span>
                    <br><br>
                    <h4>Data Transaksi</h4>
                    <div class="table-responsive shadow"> 
                        <table class="table">
                            @foreach ($siswa->transaksi as $transaksi)
                            <tbody style="font-size: 10pt;" class="text-nowrap">
                                <td>{{ $transaksi->siswa->nama_siswa }}</td>
                                <td>{{ $transaksi->tanggal }}</td>
                                <td>{{ $transaksi->total_bayar }}</td>
                                <td>
                                    @if ($transaksi->sisa_bayar <= 0)
                                    <b>LUNAS</b>
                                    @elseif ($transaksi->sisa_bayar > 0)  
                                    {{ $transaksi->sisa_bayar }}
                                    @endif
                                </td>    
                                <td>{{ $transaksi->bulan }}</td>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    @else
                        
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Ya, Hapus</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach