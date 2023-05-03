<div class="rounded shadow-sm bg-body border">
    <div class="py-2 px-3 bg-success text-light h6">
        Data Siswa
    </div>
    <div class="p-3">
        @foreach ($data_siswa as $siswa)
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th scope="row">NIS</th>
                        <td>: {{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <th scope="row">NISN</th>
                        <td>: {{ $siswa->nisn }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama Siswa</th>
                        <td>: {{ $siswa->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tahun Ajaran</th>
                        <td>: {{ $siswa->spp->tahun_ajaran }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jurusan</th>
                        <td>: {{ $siswa->kelas->kompetensi_keahlian }}</td>
                    </tr>
                    <tr>
                        <th scope="row">No Hp</th>
                        <td>: {{ $siswa->hp }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Alamat</th>
                        <td>: {{ $siswa->alamat }}</td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
            </div>     
        @endforeach
    </div>
</div>
<br>