<form action="{{ route('profileReset') }}" method="POST">
    @csrf
    <h4>Edit Password</h4>
    <p>Gunakan password yang unik dan panjang untuk tetap aman</p>
    {{-- <i style="cursor: pointer;" id="togglePassword" class="fa-solid fa-eye"></i> --}}
    <div class="form-group mb-2">
        <label class="form-label" for="current_password">Password Saat Ini</label>
        <input class="form-control" type="password" name="current_password" id="current_password" autocomplete="off" required>
    </div>
    <div class="form-group mb-2">
        <label class="form-label" for="password">Password Baru</label>
        <input class="form-control" type="password" name="password" id="password" autocomplete="off" required>
    </div>
    <div class="form-group mb-2">
        <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" autocomplete="off" required>
    </div><br>
    <button type="submit" class="btn btn-success">Save</button>
</form>