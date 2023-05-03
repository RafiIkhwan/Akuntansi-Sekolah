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