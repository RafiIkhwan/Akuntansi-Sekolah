{{-- Tambah login --}}
<div class="absolute">
    <div class="modal fade" id="loginTambah" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="Label">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('loginStore') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_admin">Nama</label>
                            <input class="form-control" type="text" name="nama_admin" id="nama_admin" required>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="email">Email</label>
                            <input class="form-control" type="text" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="role">Role</label>
                            <select class="form-control" name="role" id="role" required>
                                <option @disabled(true)>Pilih Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Petugas">Petugas</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>