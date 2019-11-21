@extends('layouts.master')
@section('content')


</style>

<div class="card border-light mb-3";>
  <div class="card-header">Pengajuan oleh Adrian</div>
  <div class="card-body">
    <h5 class="card-title">Status: Dalam Proses</h5>

      <!-- form detail pengajuan -->
      <table class="table">
        <tr>
          <th scope="col">Nama Pengusul</th>
          <td scope="col">Adrian</td>
        </tr>
        <tr>
          <th scope="col">Anggota</th>
          <td scope="col">Anggota 1 <br> Anggota 2<br> Anggota 2</td>
        </tr>
        <tr>
          <th scope="row">Judul</th>
          <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit</td>
        </tr>
          <tr>
          <th scope="row">Tujuan</th>
          <td>Dekan</td>
        </tr>
        <tr>
          <th scope="row">Sumber Dana</th>
          <td>Internal</td>
        </tr>
        <tr>
          <th scope="row">Total</th>
          <td>20000000</td>
        </tr>
        <tr>
          <th scope="row">Status</th>
          <td>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
              <label class="form-check-label" for="exampleRadios1">
                Default radio
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
              <label class="form-check-label" for="exampleRadios2">
                Second default radio
              </label>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input class="btn btn-primary" type="submit" value="Simpan">
          </td>
        </tr>
      </table> 
  </div>
</div>


@endsection