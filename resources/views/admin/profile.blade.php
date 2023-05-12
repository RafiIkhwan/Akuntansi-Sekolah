@extends('admin.index')
@section('title', 'Profile')
@section('konten')

<div class="container-md">
    <div class="my-3 p-4 rounded shadow bg-body">
        @include('components.petugas.edit-profile')
    </div>
    <div class="my-3 p-4 rounded shadow bg-body">
        @include('components.petugas.edit-password')
    </div>
    <div class="my-3 p-4 rounded shadow bg-body">
        @include('components.petugas.hapus-profile')
    </div>
</div>
{{-- <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('.toggles');

    togglePassword.addEventListener('click', () => {
        const type = password.getAttribute('type') === 'password' ?
            'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('bi-eye');
    });
</script> --}}

@endsection