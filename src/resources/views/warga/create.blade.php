@extends('layout.template')
@section('konten')

<!-- START FORM -->
<form action='{{url('warga')}}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href = '{{url('warga')}}' class="btn btn-secondary"><< KEMBALI</a>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat' id="alamat">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='no_hp' id="no_hp">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='tanggal_lahir' id="tanggal_lahir">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Status (Kawin/Belum kawin)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='status' id="status">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='agama' id="agama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>

</div>
</form>
    <!-- AKHIR FORM -->
 @endsection
