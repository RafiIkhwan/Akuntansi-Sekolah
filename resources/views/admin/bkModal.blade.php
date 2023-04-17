
{{-- Tambah crud --}}
<div class="absolute">
    <div class="modal fade" id="crudTambah" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="Label">Tambah Data crud</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('crudStore') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kodecrud">Kode crud</label>
                            <input class="form-control" type="text" name="kodecrud" id="kodecrud" required>
                            <span class="text-danger error-text kode_error"></span>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="judul">Judul</label>
                            <input class="form-control" type="text" name="judul" id="judul" required>
                            <span class="text-danger error-text judul_error"></span>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="pengarang">Pengarang</label>
                            <input class="form-control" type="text" name="pengarang" id="pengarang" required>
                            <span class="text-danger error-text pengarang_error"></span>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="penerbit">Penerbit</label>
                            <input class="form-control" type="text" name="penerbit" id="penerbit" required><br>
                            <span class="text-danger error-text penerbit_error"></span>
                        </div>
                        {{-- <span class="text-black-50"><span class="text-dark">Waktu :</span> {{ $date }}</span> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



{{-- Edit crud --}}
@foreach ($books as $book)    
<div class="absolute">
    <div class="modal fade" id="crudEdit-{{ $book->idcrud }}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="Label">Edit Data crud</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/crud/update/{{ $book->idcrud }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <label for="kodecrud">Kode crud</label>
                        <input class="form-control" type="text" name="kodecrud" id="kodecrud" value="{{ $book->kodecrud }}">
                        <label class="mt-2" for="judul">Judul</label>
                        <input class="form-control" type="text" name="judul" id="judul" value="{{ $book->judul }}">
                        <label class="mt-2" for="pengarang">Pengarang</label>
                        <input class="form-control" type="text" name="pengarang" id="pengarang" value="{{ $book->pengarang }}">
                        <label class="mt-2" for="penerbit">Penerbit</label>
                        <input class="form-control" type="text" name="penerbit" id="penerbit" value="{{ $book->penerbit }}"><br>
                        {{-- <span class="text-black-50"><span class="text-dark">Waktu     :</span> {{ $date }}</span><br> --}}
                        @if ($book->created_at != NULL)
                        <span class="text-black-50"><span class="text-dark">Di buat   :</span> {{ $book->created_at }}</span><br>
                        @endif
                        @if ($book->updated_at != NULL)
                        <span class="text-black-50"><span class="text-dark">Di edit   :</span> {{ $book->updated_at }}</span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


@foreach ($books as $book)    
<div class="absolute">
<div class="modal fade" id="crudHapus-{{ $book->idcrud }}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="Label">Yakin ingin menghapus?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-black-50">Kode crud : <b>{{ $book->kodecrud }}</b></p>
                <p class="text-black-50">Judul crud : <b>{{ $book->judul }}</b></p>
                <p class="text-black-50">Kode crud : <b>{{ $book->pengarang }}</b></p>
                <p class="text-black-50">Judul crud : <b>{{ $book->penerbit }}</b></p>
                {{-- <span class="text-black-50"><span class="text-dark">Waktu     :</span> {{ $date }}</span><br> --}}
                @if ($book->created_at != NULL)
                <span class="text-black-50"><span class="text-dark">Di buat   :</span> {{ $book->created_at }}</span><br>
                @endif
                @if ($book->updated_at != NULL)  
                <span class="text-black-50"><span class="text-dark">Di edit   :</span> {{ $book->updated_at }}</span>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <a class="btn btn-danger" href="/crud/delete/{{ $book->idcrud }}">Yakin</a>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach