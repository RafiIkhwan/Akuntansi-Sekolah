
<h4>Hapus Akun</h4>
<p>Setelah akun dihapus, semua data yang terkait dengan akun ini akan ikut terhapus secara permanent</p>
<button type="button" data-bs-toggle="modal" data-bs-target="#hapusAkun" class="btn btn-danger">Hapus Akun</button>

<div class="absolute">
    <div class="modal fade" id="hapusAkun" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('profileDelete') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="p-3">
                        <h5>Apakah anda yakin ingin menghapus akun ?</h5>
                        <p>Menghapus akun anda berarti anda akan kehilangan data-data yang terkait dengan akun ini</p>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="submit">Hapus Akun</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
