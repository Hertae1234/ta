@extends('layouts.master')
@section('content')
{!!$message!!}

<div class="card border-light mb-3";>
  <div class="card-header">Detail PengajuanA</div>
  <div class="card-body">
    
    <!-- form detail pengajuan -->
    <table class="table">
      <tr>
        <th scope="col" width="200">Nama Pengusul</th>
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
  </div>
</div>

<div class="card border-light mb-3";>
  <div class="card-header">Ubah Detail</div>
  <div class="card-body">

    <!-- FORM EDIT DETAIL -->
    <table class="table">
      <form action="{{site_url('admin/update ')}}" method="post" enctype="multipart/form-data" > <!-- memanggil method update di controller admin -->
        <input type="hidden" name="id" value="{{$pengajuan->id}}"> <!-- id akan dipakai untuk memilih data mana yang akan di update -->
        <tr>
          <div class="form-group">
              <th scope="row" width="200">Status</th>
              <td>
                <div class="form-group col-md-4">

                  @if($pengajuan->status=='diajukan')
                    <span class="badge badge-primary"><label for="status">Diajukan</label></span>
                  @elseif($pengajuan->status=='diproses')
                    <span class="badge badge-info"><label for="status">Diproses</label></span>
                  @elseif($pengajuan->status=='selesai')
                    <span class="badge badge-success"><label for="status">Selesai</label></span>
                  @else
                    <span class="badge badge-danger"><label for="status">Ditolak</label></span>
                  @endif
                  @if($pengajuan->status!='selesai' && $pengajuan->status!='ditolak' )
                  <select class="form-control" name="status" id="status"> <!-- 'name' di sini mengikuri database -->
                    <!-- value di sini mengikuti enum pada database -->
                    <option>Ubah Status</option>
                    <option value="diproses">diproses</option>
                    <option value="ditolak">ditolak</option>
                    <option value="selesai">selesai</option>
                  </select>
                  @endif
                </div>
              </td>
          </div>
        </tr>
        @if($pengajuan->status!='ditolak' && $pengajuan->status!='selesai')
        <tr>
          <th scope="row">Waktu Selesai (perkiraan) </th>
          <td>
            <input type="date" name="tanggal_selesai" min="1979-12-31" max="2079-12-31" value="{{$pengajuan->tanggal_selesai}}"><br>
          </td>
        </tr>
        @endif
        <tr>
          <th scope="row">Catatan </th>
          <td>
            <input class="form-control" id="catatan" name="catatan" value="{{$pengajuan->catatan}}">
          </td>
        </tr>
        @if($pengajuan->status != 'selesai')
        <tr>
          <th scope="row">File Scan </th>
          <td>
            <input type="file" name="bukti_scan"/>
          </td>
        </tr>
        @endif
        <tr>
          <td>
            <input class="btn btn-primary" type="submit" name="Simpan" value="Simpan">
            @if(!empty($pengajuan->bukti_scan))
            <a href="{{base_url('upload/'.$pengajuan->bukti_scan)}}" target="_blank" class="btn btn-success">Download</a>
            @endif
          </td>
        </tr>
      </form>
    </table> 
  </div>
</div>

@endsection