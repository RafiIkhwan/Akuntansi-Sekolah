@foreach($spps as $spp)
<div class="absolute">
    <div class="modal fade" id="sppHapus-{{ $spp->id_spp }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-danger modal-title" id="Label">Hapus Data SPP</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('sppDelete', $spp->id_spp ) }}" method="post">
                @csrf
                <div class="modal-body">
                    <span>Yakin ingin menghapus data SPP tahun <b>{{ $spp->tahun_ajaran }}</b> ?</span>
                    <br><br>
                    @if (count($spp->siswa) > 0)
                    <span class="bg-danger text-light px-2 py-1 w-100">Anda juga akan kehilangan data-data dibawah</span>
                    <br><br>
                    <h4>Data Siswa</h4>
                    <div class="table-responsive shadow p-2">
                        <table class="table">
                            @foreach($spp->siswa as $siswa)
                            <tbody style="font-size: 10pt;" class="text-nowrap">
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nisn }}</td>
                                <td>{{ $siswa->nama_siswa }}</td>
                                <td>{{ $siswa->spp->tahun_ajaran }}</td>
                                <td>{{ $siswa->kelas->kompetensi_keahlian }}</td>
                                <td>{{ $siswa->kelas->nama_kelas }}</td>
                                <td>{{ $siswa->alamat }}</td>
                                <td>{{ $siswa->hp }}</td>
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