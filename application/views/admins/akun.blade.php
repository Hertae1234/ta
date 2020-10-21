
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