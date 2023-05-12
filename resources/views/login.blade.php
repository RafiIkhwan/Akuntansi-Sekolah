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
        <div class="text-center mb-3 mt-5">
            <img src="{{ asset('image/logo.png') }}" alt="Logo SMK 1 Cimahi" class="img-fluid border-none" style="max-width:15%;">                        
        </div>
        <h3 class="text-center">Akuntansi Sekolah</h3><br>
        <div class="w-50 border shadow rounded-3 m-auto px-2">
            <div class="col-md-10 col-md-offset-10 m-auto py-4">
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
                        <label class="form-label" for="email">Email</label>
                        <input id="email" type="email" name="email" class="form-control" placeholder="Email" autocomplete="off" required>
                    </div>
                    <div class="form-group mt-1">
                        <label class="form-label" for="email">Password</label>
                        <input id="password" type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block form-control">Log In</button>
                    <hr>
                    <p class="text-center" >Belum punya akun? <a href="" data-bs-toggle="modal" data-bs-target="#loginTambah" >Register</a> sekarang!</p>           
                </form>
            </div>
        </div>
        @include('regis')
        <br><br>
        <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    </body>
</html>