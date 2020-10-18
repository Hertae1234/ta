
@extends('layouts.master')
@section('content')

<form action="<?php echo site_url('pengajuan/store') ?>" method="post">
  <div class="form-group row">
    <label for="pengusul" class="col-sm-2 col-form-label">Nama Pengusul</label>
    <div class="col-sm-9 pengusul-container">
      <div class="pengusul-wrap">
        <select name="id_pengusul" id="pengusul" class="form-control">
          <option value="">Pilih...</option>
          @foreach($akd_dosens as $key)
          <option value="{{$key->id}}">{{$key->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-9">
      <textarea type="text" name="judul" class="form-control" id="judul" placeholder="Judul"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="anggota" class="col-sm-2 col-form-label">Anggota</label>
    <div class="col-sm-2">Dosen atau Tendik</div>    
    <div class="col-sm-6 anggota-container">
      <div class="anggota-wrap">
        <select name="anggota[]" id="anggota" class="form-control">
          <option value="">Pilih...</option>
          @foreach($akd_dosens as $key)
          <option value="{{$key->id}}">{{$key->name}}</option>
          @endforeach
        </select>        
      </div>
    </div>
    <div id="section1" class="col-sm-2">
      <button type="button" id="btn-anggota">Tambah</button>
    </div> 
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
    <div class="col-sm-2">Mahasiswa</div>
      <div class="col-sm-6 anggota-container2">
        <div class="anggota-wrap2">
          <input type="text" name="mahasiswa[]" class="form-control" id="anggota" placeholder="Nama">
        </div>
      </div>
        <div class="col-sm-2">
          <div id="section2" class="col-sm-2">
            <button type="button" id="btn-anggota2">Tambah</button>
          </div>  
        </div>
  </div>
  <div class="form-group row">
    <label for="sumber_dana" class="col-sm-2 col-form-label">Sumber Dana</label>
    <div class="col-sm-2">
      <select name="jenis_sumber_dana" id="sumber_dana" class="form-control">
        <option selected value="internal">Internal</option>
        <option value="eksternal">Eksternal</option>
      </select>                
    </div>
    <div class="col-sm-7">
      <label for="keterangan" class="sr-only">Keterangan</label>
      <input name="sumber_dana" type="text" class="form-control" id="keterangan" placeholder="Keterangan">
    </div>
  </div>
    <div class="form-group row">
    <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
    <div class="col-sm-4">
      <input type="text" name="tujuan" class="form-control" id="tujuan" placeholder="Tujuan">
    </div>
    <label for="total" class="col-sm-1 col-form-label">Total</label>
    <div class="col-sm-4">
      <input type="text" name="total" class="form-control" id="total" placeholder="Total">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6">
      <button type="submit" name="button_1" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection 