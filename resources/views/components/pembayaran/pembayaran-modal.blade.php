@include('components.pembayaran.aksi.tambahPembayaran')
@include('components.pembayaran.aksi.detailPembayaran')
@include('components.pembayaran.aksi.editPembayaran')
@include('components.pembayaran.aksi.konfirmasiHapus')


<div class="absolute">
    <div class="modal fade" id="transaksiDetail-kosong" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Data kosong
                </div>
                <div class="modal-body">
                    <div class="">
                        Data Belum Ada
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
        