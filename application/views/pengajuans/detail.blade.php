@extends('layouts.master')
@section('content')

<div class="card border-light mb-3";>
  <div class="card-header">Detail Pengajuan</div>
  <div class="card-body">
    <h5 class="card-title">Status: Dalam Proses</h5>

      <!-- form detail pengajuan -->
      <table class="table">
        <tr>
          <th scope="col">Nama Pengusul</th>
          <td scope="col">{{$pengajuan->name}}</td>
        </tr>
        <tr>
          <th scope="col">Anggota</th>
          <td scope="col">
            @foreach($pengajuan->anggota as $anggota) 
              @if(!empty($anggota->nama_dosen))
                {{$anggota->nama_dosen}},
              @else
                {{$anggota->nama_mahasiswa}},
              @endif
            @endforeach
          </td>
        </tr>
        <tr>
          <th scope="row">Judul</th>
          <td>{{$pengajuan->judul}}</td>
        </tr>
          <tr>
          <th scope="row">Tujuan</th>
          <td>{{$pengajuan->tujuan}}</td>
        </tr>
        <tr>
          <th scope="row">Sumber Dana</th>
          <td>{{$pengajuan->sumber_dana}}</td>
        </tr>
        <tr>
          <th scope="row">Total</th>
          <td>{{$pengajuan->total}}</td>
        </tr>
        <tr>
          <form>
            <div class="form-group">
          <th scope="row">{{$pengajuan->status}}</th>
          <td>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
              <label class="form-check-label" for="exampleRadios1">
                Dalam Proses
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
              <label class="form-check-label" for="exampleRadios2">
                Selesai
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
              <label class="form-check-label" for="exampleRadios2">
                Ditolak
              </label>
            </div>
          </td>
          </div>  
          </form>
        </tr>
        <tr>
          <th scope="row">File Scan </th>
          <td>
            <input type="file" name="berkas" />
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