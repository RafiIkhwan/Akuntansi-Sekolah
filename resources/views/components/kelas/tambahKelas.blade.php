<div class="absolute">
    <div class="modal fade" id="kelasTambah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="Label">Tambah Data Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kelasStore') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mt-1">
                        <label class="my-1" for="kelas">Nama Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" required>
                    </div>
                    <div class="form-group mt-1">
                        <label class="my-1" for="kk">Nama Kompetensi Keahlian</label>
                        <input type="text" class="form-control" id="kk" name="kk" required>
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