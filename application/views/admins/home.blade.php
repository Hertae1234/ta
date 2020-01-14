@extends('layouts.master')
@section('content')
{!!$message!!}

<div class="col-md-12">
<h4>Daftar Pengajuan</h4>
<div class="table-responsive">


<table id="mytable" class="table table-hover table-striped">
   
  <thead>
      <th>No</th>
      <th>Nama</th>
      <th>Judul</th>
      <th>Tujuan</th>
      <th>Sumber Dana</th>
      <th>Total</th>
      <th>Status</th>
      <th></th>
  </thead>

  <tbody> 
    <?php $i =1; ?>
    @foreach($pengajuan as $p)
    @if($p->status != "draf")
    <tr>
      <td><?php echo $i; ?></td>
      <td>{{ $p->name}}</td>
      <td>{{ $p->judul}} </td>
      <td>{{ $p->tujuan}}</td>
      <td>{{ $p->sumber_dana}}</td>
      <td>{{ $p->total}}</td>
      <td>
          <a href="{{site_url('admin/pengajuan/'.$p->id)}}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Detail</a>
          @if($p->status == "ditolak")
          <span class="badge badge-pill badge-danger">Ditolak</span>
          @elseif($p->status == "diproses")
          <span class="badge badge-pill badge-info">Diproses</span>
          @elseif($p->status == "selesai")
          <span class="badge badge-pill badge-success">Selesai</span>
          @else
          <span class="badge badge-pill badge-primary">Diajukan</span>
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

@endsection