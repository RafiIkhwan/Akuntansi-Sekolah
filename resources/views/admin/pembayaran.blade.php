@extends('admin.index')
@section('title', 'Pembayaran')
@section('konten')

<div class="container-md">
    <div class="h4">
        <i class="fa-solid fa-money-bill"></i> <span class="mr-5"> Transaksi Pembayaran</span>
    </div>
    <br>
    <div class="rounded shadow-sm bg-body border">
        <div class="py-2 px-3 bg-primary text-light h6">
            Filter Data Pembayaran Siswa
        </div>
        <div class="p-3">
            <form class="d-flex align-items-center" action="{{ route('pembayaranCari') }}" method="get">
                <label class="text-nowrap h6" for="thnajaran">Tahun Ajaran</label>
                <select class="form-select mx-3" style="max-width: 150px;" type="text" name="thnajaran" id="thnajaran">
                    <option @disabled(true)>Pilih Tahun Ajaran</option>
                    @foreach ($data_tahun as $tahun)
                        <option value="{{ $tahun->tahun_ajaran }}" @if(request()->thnajaran == $tahun->tahun_ajaran) selected @endif>
                            {{ $tahun->tahun_ajaran }}
                        </option>
                    @endforeach
                </select>
                <label class="text-nowrap h6" for="idsiswa">Cari Siswa</label>
                <input class="form-control mx-3" type="search" name="idsiswa" id="idsiswa" placeholder="Masukkan NIS/NISN Siswa" value="{{ request()->idsiswa }}" required><br>
                <button class="btn mx-3" style="opacity: 1;" type="submit" disabled="checkInput()">Cari</button>
            </form>
        </div>
    </div>
    <br>
    @if ($data_siswa == !null)
    
    @include('components.pembayaran.pembayaran-data')
    @include('components.pembayaran.pembayaran-modal')

    @endif
</div>

<script src="{{ asset('assets/js/pembayaran.js') }}"></script>

@endsection