<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Akuntansi Sekolah | @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
        <link rel="icon" href="{{ asset('image/favicon.ico') }}">
    </head>
    <body style="height: 100vh;" class="d-flex flex-column">
        <div class="mb-5">
            <div class="col-md-12">
                @include('components.navigation')

                <br><br><br>
                
                <div id="konten" class="d-flex flex-row mx-3">                    
                    @include('components.sidebar')

                    <div id="content" style="margin-left: 160px; margin-top: 20px; width: 100%;">
                        @include('components.notification')
                        
                        @yield('konten')
                        
                    </div>
                </div>
            </div>
        </div>
        <br><br>

        {{-- @include('components.footer') --}}
        <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    </body>
</html>