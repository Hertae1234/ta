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
          <span class="badge badge-pill badge-secondary">Draft</span>
          <a class="btn btn-primary btn-sm active" href="{{site_url('pengajuan/detail/'.$p->id)}}">Detail</a>
        </td>
      </tr>
      <?php $i++; ?>
      @endforeach
    </tbody>
</table>
@endsection