@foreach($data_kelas as $kelas)
<div class="absolute">
    <div class="modal fade" id="kelasEdit-{{ $kelas->id_kelas }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-warning modal-title" id="Label">Edit Data Kelas</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route( 'kelasUpdate', $kelas->id_kelas ) }}" method="post">
                @csrf 
                <div class="modal-body">
                    <div class="form-group mt-1">
                        <label class="my-1" for="kelas">Nama Kelas</label>
                        <input class="form-control" name="kelas" id="kelas" value="{{ $kelas->nama_kelas }}" required>
                    </div>
                    <div class="form-group mt-1">
                        <label class="my-1" for="kk">Nama Kompetensi Keahlian</label>
                        <input class="form-control" name="kk" id="kk" value="{{ $kelas->kompetensi_keahlian }}" required>
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