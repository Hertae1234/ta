@extends('layouts.master')
@section('content')

<?php /*
  $query = "SELECT * FROM akd_dosens WHERE nidn = $_SESSION['username']";
  $result = mysqli_query($query);*/

 $_SESSION['username'];
?>

<form action="<?php echo site_url('pengajuan/store') ?>" method="post" id="baru">
  @if (isset($pengajuan->id))
    <input type="hidden" name="id_pengajuan" value="{{$pengajuan->id}}">
  @endif
  <div class="form-group row">
    <label for="pengusul" required="required" class="col-sm-2 col-form-label">Nama Pengusul</label>
    <div class="col-sm-9 pengusul-container">

        @if($_SESSION['is_admin'] == '0')
          <input type="text" class="form-control" value="{{$pengusul->name}}" disabled >
          <input type="hidden" name="id_pengusul" value="{{$pengusul->id}}">
        @else
        <select name="id_pengusul" id="pengusul" class="form-control">
          <option value="">Pilih ... </option>
          @foreach($akd_dosens as $key)
          <option value="{{$key->id}}">{{$key->name}}</option>
          @endforeach
        </select>
        @endif
    </div>
  </div>
  <div class="form-group row">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-9">
      <textarea type="text" name="judul" required="required" class="form-control" id="judul" placeholder="Judul">{{isset($pengajuan->judul) ? $pengajuan->judul : ''}}</textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="anggota" class="col-sm-2 col-form-label">Anggota</label>
    <div class="col-sm-2">Dosen atau Tendig</div>    
    <div class="col-sm-5 anggota-container">
      @if (!empty($pengajuan->anggota))
        @foreach($pengajuan->anggota as $anggota)
          @if($anggota->id_dosen!=NULL)
            <div class="anggota-wrap">
              <select name="anggota[]" id="anggota" class="form-control">
                <option value="">Pilih...</option>
                @foreach($akd_dosens as $key)
                <option value="{{$key->id}}" {{ set_select('anggota[]', $key->id, $key->id == $anggota->id_dosen)}}>{{$key->name}}</option>
                @endforeach
              </select>        
            </div>
          @endif
        @endforeach
      @endif
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
      <div class="col-sm-5 anggota-container2">
        @if (!empty($pengajuan->anggota))
          @foreach($pengajuan->anggota as $anggota)
            @if($anggota->id_dosen==NULL)
              <div class="anggota-wrap2">
                <input type="text" name="mahasiswa[]" class="form-control" id="anggota" placeholder="Nama" value="{{$anggota->nama}}">
              </div>        
            @endif
          @endforeach
        @endif

        <div class="anggota-wrap2">
          <input type="text" name="mahasiswa[]" class="form-control" id="anggota" placeholder="Nama">
        </div>
      </div>
          <div id="section2" class="col-sm-2" >
            <button type="button" id="btn-anggota2">Tambah</button>
          </div>  
  </div>
  <div class="form-group row">
    <label for="sumber_dana" class="col-sm-2 col-form-label">Sumber Dana</label>
    <div class="col-sm-2">
      <select name="jenis_sumber_dana" id="jenis_sumber_dana" class="form-control">
        <option {{isset($pengajuan->jenis_sumber_dana) && $pengajuan->jenis_sumber_dana == 'internal' ? 'selected' : ''}} value="internal">Internal</option>
        <option {{isset($pengajuan->jenis_sumber_dana) && $pengajuan->jenis_sumber_dana == 'eksternal' ? 'selected' : ''}} value="eksternal">Eksternal</option>
      </select>                
    </div>
    <div class="col-sm-7">
      <label for="keterangan" class="sr-only">Keterangan Sumber Dana</label>
      <input name="sumber_dana" type="text" class="form-control" id="sumber_dana" placeholder="Keterangan Sumber Dana" value="{{isset($pengajuan->sumber_dana) ? $pengajuan->sumber_dana : ''}}">
    </div>
  </div>
    <div class="form-group row">
    <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
    <div class="col-sm-4">
      <input type="text" name="tujuan" class="form-control" id="tujuan" placeholder="Tujuan" 
      value="{{isset($pengajuan->tujuan) ? $pengajuan->tujuan : ''}}">
    </div>
    <label for="total" class="col-sm-1 col-form-label">Total</label>
    <div class="col-sm-4">
      <input type="number" name="total" class="form-control" id="total" placeholder="Total"
      value="{{isset($pengajuan->total) ? $pengajuan->total : ''}}">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6">
      <button type="button" onclick="ajukan()" name="button_1" class="btn btn-success">Ajukan</button>
      <button type="button" onclick="simpan()" name="button_2" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>

<script type="text/javascript">
  function  ajukan() {
    if ($('#judul').val().replace(/^\s+|\s+$/gm,'').length == 0 ){
      alert('Judul harus diisi!');
      return false;
    }

    if (!$.isNumeric($('#total').val())) {
      alert('Total harus diisi angka!');
      return false;
    }

    if ($('#total').val() < 0) {
      alert('Total tidak boleh kurang dari nol!');
      return false;
    }

    $('#baru').attr('action', '<?php echo site_url('pengajuan/store/diajukan') ?>');
    $('#baru').submit();
  }

  function  simpan() {
    if ($('#judul').val().replace(/^\s+|\s+$/gm,'').length == 0 ){
      alert('Judul harus diisi!');
      return false;
    }
    
    if (!$.isNumeric($('#total').val())) {
      alert('Total harus diisi angka!');
      return false;
    }

    if ($('#total').val() < 0) {
      alert('Total tidak boleh kurang dari nol!');
      return false;
    }

    $('#baru').submit();
  }


</script>
@endsection