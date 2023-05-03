<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Akuntansi Sekolah | Login</title>
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="icon" href="{{ asset('image/favicon.ico') }}">
    </head>
    <body>
        <div class="w-50 border shadow rounded mt-5 m-auto px-5">
            <div class="col-md-10 col-md-offset-10 m-auto py-4">
                <div class="text-center mb-3">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo SMK 1 Cimahi" class="img-fluid border-none" style="max-width:40%;">                        
                </div>
                <h2 class="text-center">Akuntansi Sekolah</h2><br>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Error : </b> {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('logout'))
                    <div class="alert alert-warning">
                        {{ session('logout') }}
                    </div>
                @endif
                <form action="{{ route('loginaksi') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group mt-1">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block px-3">Log In</button>
                    <hr>
                    <p class="text-center" >Belum punya akun? <a href="" data-bs-toggle="modal" data-bs-target="#loginTambah" >Register</a> sekarang!</p>
                                        
                </form>
            </div>
        </div>
        @include('regis')
        <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    </body>
</html>