@extends('layouts.master')
@section('content')
{!!$message!!}

<table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Pengusul</th>
        <th scope="col">Judul</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $i =1; ?>
      @foreach($pengajuan as $p)
      <tr>
        <td scope="row"><?php echo $i; ?></td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->judul }}</td>
        <td>
          <a class="btn btn-primary btn-sm active" href="{{site_url('pengajuan/detail/'.$p->id)}}">Detail</a>
          @if($p->status == "ditolak")
          <span class="badge badge-pill badge-danger">Ditolak</span>
          @elseif($p->status == "selesai")
          <span class="badge badge-pill badge-success">Selesai</span>
          @elseif($p->status == "diajukan")
          <span class="badge badge-pill badge-primary">Diajukan</span>
          @elseif($p->status == "diproses")
          <span class="badge badge-pill badge-info">Diproses</span>
          @else
          <span class="badge badge-pill badge-secondary">Draf</span>
          @endif
        </td>
      </tr>
      <?php $i++; ?>
      @endforeach
    </tbody>
</table>
@endsection