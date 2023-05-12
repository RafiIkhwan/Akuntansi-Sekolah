<div class="absolute">
    <div class="modal fade" id="sppTambah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="Label">Tambah Data SPP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('sppStore') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mt-1">
                        <label class="my-1" for="tahunajar">Tahun Ajaran</label>
                        <input class="form-control" type="text" id="tahunajar" name="tahunajar" autocomplete="off" required placeholder="2022/2023">
                    </div>
                    <div class="form-group mt-1">
                        <label for="biaya" class="my-1">Biaya</label>
                        <input class="form-control" type="number" id="biaya" name="biaya" autocomplete="off" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>