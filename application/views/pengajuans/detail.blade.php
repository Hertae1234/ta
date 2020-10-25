@extends('layouts.master')
@section('content')
<div class="card border-light mb-3";>
  <div class="card-header">Detail pengajuan</div>
  <div class="card-body">
    @if ($pengajuan->status == 'ditolak')
      <h5 class="card-title" style="color: red">Status: DITOLAK karena: {{$pengajuan->catatan}}</h5>
    @elseif($pengajuan->status == 'diproses')
      <h5 class="card-title">Status: Sedang diproses, perkiraan waktu selesai: {{$pengajuan->tanggal_selesai}}</h5>
    @elseif($pengajuan->status == 'selesai')
      <h5 class="card-title">Status: Selesai, {{$pengajuan->catatan}}</h5>     
    @elseif($pengajuan->status == 'diajukan')
      <h5 class="card-title">Status: Sudah diajukan, harap menunggu informasi selanjutnya</h5>     
    @else
      <h5 class="card-title">Status: Draf</h5>     
    @endif

      <!-- form detail pengajuan -->
      <table>
        <tr>
          <th width="200" scope="col">Nama Pengusul</th>
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
      </table>

        @if ($_SESSION['is_admin'] == '1')
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 ">Status</label>
            <div class="col-md-6 col-sm-9">
              <select class="form-control" name="status" id="status">
                <option>{{$pengajuan->status}}</option>
                <option value="diproses">Diproses</option>
                <option value="ditolak">Ditolak</option>
                <option value="selesai">Selesai</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 ">Pesan</label>
            <div class="col-md-6 col-sm-9 ">
              <textarea class="form-control" rows="3"></textarea>
            </div>
          </div>

          <div class="form-group row">
          <label class="control-label col-md-3 col-sm-3 ">Kelola Berkas</label>

          @if(!empty($pengajuan->bukti_scan))
            <td>{{$pengajuan->bukti_scan}}</td>
            <a href="{{base_url('upload/'.$pengajuan->bukti_scan)}}" target="_blank" class="btn btn-success">Download</a>
          @else
            <input type="file" name="bukti_scan"/>
          @endif
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-9 col-sm-9  offset-md-3">
              <button href ="" type="button" class="btn btn-primary">Kembali</button>
              <button type="submit" name="submit" value="Simpan" class="btn btn-success">Simpan</button>
            </div>
          </div>
      @endif

      @if($pengajuan->status == 'draf')
          <a href="{{site_url('pengajuan/edit/'.$pengajuan->id)}}" class="btn btn-primary">Edit</a>
          <a href="{{site_url('pengajuan/ajukan/'.$pengajuan->id)}}" class="btn btn-success">Ajukan</a>
      @endif
          <a href="{{$_SERVER['HTTP_REFERER']}}" class="btn btn-primary" role="button" aria-pressed="true">Kembali</a>
      @if($pengajuan->bukti_scan != NULL && $pengajuan->status == 'selesai')
        <a href="{{base_url('upload/'.$pengajuan->bukti_scan)}}" target="_blank" class="btn btn-success">Download</a>
      @endif

  </div>
</div>

@endsection