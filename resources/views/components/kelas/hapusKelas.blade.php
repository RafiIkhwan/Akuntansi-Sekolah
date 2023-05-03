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
                                <td>{{ $siswa->spp->tahun_ajaran }}</td>
                                <td>{{ $siswa->kelas->kompetensi_keahlian }}</td>
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