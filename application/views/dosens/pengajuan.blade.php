@extends('layouts.master')
@section('content')
<form>
  <div class="form-group row">
    <label for="namaPengusul" class="col-sm-2 col-form-label">Nama Pengusul</label>
    <div class="col-sm-10">
      <input type="namaPengusul" class="form-control" id="namaPengusul" placeholder="Nama Pengusul">
    </div>
  </div>
  <div class="form-group row">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <input type="judul" class="form-control" id="judul" placeholder="Judul">
    </div>
  </div>
  <div class="form-group row">
    <label for="anggota" class="col-sm-2 col-form-label">Anggota</label>
    <div class="col-sm-3">Dosen atau Tendik</div>    
    <div class="col-sm-7">
      <select id="anggota" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>                
    </div>
  </div>
  <div class="form-group row">
    <label for="anggota" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-3">Mahasiwa</div>
      <div class="col-sm-7">
        <input type="anggota" class="form-control" id="anggota" placeholder="Nama">
      </div>
  </div>
  <div class="form-group row">
    <label for="sumberDana" class="col-sm-2 col-form-label">Sumber Dana</label>
    <div class="col-sm-3">
      <select id="sumberDana" class="form-control">
        <option selected>Internal</option>
        <option>Eksternal</option>
      </select>                
    </div>
    <div class="col-sm-7">
      <label for="keterangan" class="sr-only">Keterangan</label>
      <input type="keterangan" class="form-control" id="keterangan" placeholder="Keterangan">
    </div>
  </div>
  <div class="form-group row">
    <label for="total" class="col-sm-2 col-form-label">Total</label>
    <div class="col-sm-10">
      <input type="total" class="form-control" id="total" placeholder="Total">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Kirim</button>
    </div>
  </div>
</form>
@endsection 