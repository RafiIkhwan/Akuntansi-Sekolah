<div class="absolute">
    <div class="modal fade" id="transaksiTambah" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="Label">Tambah Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @foreach ($data_siswa as $siswa)
                <form action="{{ route('pembayaranStore') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input class="form-control" type="hidden" name="idsiswa" id="idsiswa" value="{{ $siswa->id_siswa }}" readonly>
                        <input class="form-control" type="hidden" name="idadmin" id="idadmin" value="{{ Auth::user()->id_admin }}" readonly>
                        <div class="form-group">
                            <label class="my-1" for="nmsiswa">Nama Siswa</label>
                            <input class="form-control" type="text" name="nmsiswa" id="nmsiswa" placeholder="{{ $siswa->nama_siswa }}" readonly>
                        </div>
                        <div class="form-group mt-1">
                            <label class="my-1" for="tanggal">Tanggal</label>
                            <input class="form-control" type="date" name="tanggal" id="tanggal" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="form-group mt-1">
                            <label class="my-1" for="totalbayar">Total Bayar</label>
                            <input class="form-control" type="number" name="totalbayar" id="totalbayar" required>
                        </div>
                        <div class="form-group mt-1">
                            <label class="my-1" for="bulan">Bulan</label>
                            <select class="form-control" type="text" name="bulan" id="bulan" required>
                                <option @disabled(true)>Pilih Bulan</option>
                                @foreach ($bulan as $nama_bulan)
                                    @php
                                        $total = $siswa->transaksi->where('bulan', $nama_bulan)->sum('total_bayar');
                                    @endphp
                                    @if ($total < 150000)
                                        <option value="{{ $nama_bulan }}">{{ $nama_bulan }}</option>
                                    @endif
                                @endforeach
                            </select>
                                                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>