@extends('layouts.master')
@section('content')
{!!$message!!}

<div class="col-md-12">
<h4>Detail Pengajuan</h4>
<form action="{{site_url('admin/update')}}" method="post" enctype="multipart/form-data" > <!-- memanggil method update di controller admin -->
  <div class="col-md-9 ">
    <div class="x_panel">
      <div class="x_title">
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        

          <div class="form-group row ">
            <label class="control-label col-md-3 col-sm-3 ">Nama Pengusul</label>
            <div class="col-md-9 col-sm-9 ">
              <td type="text" class="form-control" placeholder="Default Input">{{$pengajuan->name}}</td>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 ">Nama Anggota</label>
            <div class="col-md-9 col-sm-9 ">
              <td type="text" class="form-control" placeholder="Default Input">
                @foreach($pengajuan->anggota as $anggota) 
                  @if(!empty($anggota->nama_dosen))
                    {{$anggota->nama_dosen}},
                  @else
                    {{$anggota->nama_mahasiswa}},
                  @endif
                @endforeach
              </td>
            </div>
          </div>

          <div class="form-group row ">
            <label class="control-label col-md-3 col-sm-3 ">Judul</label>
            <div class="col-md-9 col-sm-9 ">
              <td type="text" class="form-control" placeholder="Default Input">{{$pengajuan->judul}}</td>
            </div>
          </div>

          <div class="form-group row ">
            <label class="control-label col-md-3 col-sm-3 ">Tujuan</label>
            <div class="col-md-9 col-sm-9 ">
              <td type="text" class="form-control" placeholder="Default Input">{{$pengajuan->tujuan}}</td>
            </div>
          </div>

          <div class="form-group row ">
            <label class="control-label col-md-3 col-sm-3 ">Sumbar Dana</label>
            <div class="col-md-9 col-sm-9 ">
              <td type="text" class="form-control" placeholder="Default Input">{{$pengajuan->sumber_dana}}</td>
            </div>
          </div>

          <div class="form-group row ">
            <label class="control-label col-md-3 col-sm-3 ">Total</label>
            <div class="col-md-9 col-sm-9 ">
              <td type="text" class="form-control" placeholder="Default Input">{{$pengajuan->total}}</td>
            </div>
          </div>

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

      </div>
    </div>
  </div>
</form>
@endsection