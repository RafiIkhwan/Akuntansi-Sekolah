@foreach($spps as $spp)
<div class="absolute">
    <div class="modal fade" id="sppEdit-{{ $spp->id_spp }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-warning modal-title" id="Label">Edit Data SPP</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('sppUpdate', $spp->id_spp ) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mt-1">
                        <label class="my-1" for="tahunajar">Tahun Ajaran</label>
                        <input class="form-control" type="text" id="tahunajar" name="tahunajar" value="{{ $spp->tahun_ajaran }}" autocomplete="off" readonly>
                    </div>
                    <div class="form-group mt-1">
                        <label for="biaya" class="my-1">Biaya</label>
                        <input class="form-control" type="number" id="biaya" name="biaya" value="{{ $spp->biaya }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach