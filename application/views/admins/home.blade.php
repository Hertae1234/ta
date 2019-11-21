@extends('layouts.master')
@section('content')
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
      <th>Tanggal</th>
      <th>Status</th>
      <th></th>
  </thead>

  <tbody> 
    <tr>
      <td>1</td>
      <td>Ardian</td>
      <td>Penelitian ... </td>
      <td>Dekan</td>
      <td>Internal</td>
      <td>10-10-19</td>
      <td><span class="badge badge-pill badge-success">selesai</span></td>
      <td>
        <div class="dropdown show">
          <a class="btn btn-sm btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Aksi
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="/TA/admin/pengajuan">detail</a>
            <a class="dropdown-item" href="#">unggah scan</a>
          </div>
        </div>
      </td>
    </tr>

        <tr>
      <td>2</td>
      <td>Burdian</td>
      <td>Penelitian ... </td>
      <td>Dekan</td>
      <td>Eksternal</td>
      <td>10-11-19</td>
      <td><span class="badge badge-pill badge-primary">dalam proses</span></td>
      <td>
        <div class="dropdown show">
          <a class="btn btn-sm btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Aksi
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">detail</a>
            <a class="dropdown-item" href="#">unggah scan</a>
          </div>
        </div>
      </td>
    </tr>

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