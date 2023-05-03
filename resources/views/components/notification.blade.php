<div class="mb-2 mx-3">
    <div class="mb-3">
        <a class="text-dark h5" style="text-decoration: none;" href="{{ route('home') }}">Dashboard</a><br>
        <a style="text-decoration: none; font-weight: 400;" class="text-dark h6" href="{{ route('home') }}">Dashboard > 
            <a style="text-decoration: none; font-weight: 400;" class="text-dark h6" href="">
                @php 
                    $url = ucfirst(Route::getCurrentRoute()->getName());

                    if (strpos($url, 'Cari') !== false) {
                        $url = str_replace('Cari', '', $url);
                    }
                @endphp
                {{ $url }}
            </a> 
        </a>
    </div>
    <span>
        @if (session()->has('success'))
            <div class="alert alert-info position-static">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('edit'))
            <div class="alert alert-warning position-static">
                {{ session('edit') }}
            </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger position-static">
            {{ session('error') }}
        </div>
        @endif
    </span>
</div>