@foreach($data_siswa as $siswa)
<div class="absolute">
    <div class="modal fade" id="siswaEdit-{{ $siswa->id_siswa }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-warning modal-title" id="Label">Edit Data Siswa</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('siswaUpdate', $siswa->id_siswa ) }}" method="post">
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