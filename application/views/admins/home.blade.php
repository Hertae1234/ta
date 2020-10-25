@extends('layouts.master')
@section('content')

{!!$message!!}


<div class="col-md-12">
<h4>Daftar Pengajuan</h4>
<div class="table-responsive">


<table id="daftar_pengajuan" class="table table-hover table-striped table-condensed">
  <thead>
      <th>No</th>
      <th class="th-sm">
        <a href="{{site_url('admin?' . http_build_query(array_merge($params, ['sort' => 'name'])))}}">Nama Pengusul</a>
      </th>
      <th class="th-sm">
        <a href="{{site_url('admin?' . http_build_query(array_merge($params, ['sort' => 'judul'])))}}">Judul</a>
      </th>
      <th class="th-sm">
        <a href="{{site_url('admin?' . http_build_query(array_merge($params, ['sort' => 'tujuan'])))}}">Tujuan</a>
        </th>
      <th>Aksi</th>
  </thead>

  <tbody class="tbody-sm"> 

    <?php $i =1; ?>

    @foreach($pengajuan as $p)
    @if($p->status != "draf")
    <tr>
      <td><?php echo $i; ?></td>
      <td>{{ $p->name}}</td>
      <td>{{ $p->judul}} </td>
      <td>{{ $p->tujuan}}</td>
      <td>
          <a href="{{site_url('admin/pengajuan/'.$p->id)}}">Detail</a>
          @if($p->status == "ditolak")
          <span class="badge badge-pill badge-danger">Ditolak</span>
          @elseif($p->status == "diproses")
          <span class="badge badge-pill badge-info">Diproses</span>
          @elseif($p->status == "selesai")
          <span class="badge badge-pill badge-success">Selesai</span>
          @else
          <span class="badge badge-pill badge-primary">BARU!</span>
          @endif
      </td>
    </tr>
    <?php $i++; ?>
    @endif
    @endforeach
  </tbody>    

</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
<link rel = "stylesheet" type = "text/css" 
   href = "<?php echo base_url(); ?>css/styles.css">

<script type = 'text/javascript' src = "<?php echo base_url(); 
   ?>js/ajax.js"></script>

@endsection
