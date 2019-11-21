@extends('layouts.master')
@section('content')
<table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama Pengusul</th>
        <th scope="col">Judul</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>John</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Jerry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
</table>
@endsection