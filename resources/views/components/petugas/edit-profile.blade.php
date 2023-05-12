<form action="{{ route('profileUpdate') }}" method="POST">
    @csrf
    <h4>Informasi Profil</h4>
    <p>Update profil informasi dan akun email anda</p>
    <div class="form-group mb-2">
        <label class="form-label" for="namapetugas">Nama</label>
        <input class="form-control" type="text" name="namapetugas" id="namapetugas" autocomplete="off" value="{{ $namapetugas }}" required>
    </div>
    <div class="form-group mb-2">
        <label class="form-label" for="email">Email</label>
        <input class="form-control" type="text" name="email" id="email" autocomplete="off" value="{{ $email }}" required>
    </div><br>
    <button type="submit" class="btn btn-success">Save</button>
</form> 