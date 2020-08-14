@extends('layouts.app')
@section('content')
<table class="table table-dark bg-gradient table-striped" style="margin-top:-25px">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Masuk</th>
      <th scope="col">Keluar</th>
      <th scope="col">Tanggal</th>
    </tr>
  </thead>
  <tbody>
  @foreach($mutasi as $no => $m)
    <tr>
      <th scope="row">{{ ++$no }}</th>
      <td>{{ $m -> kode_barang }}</td>
      <td>{{ $m -> nama_barang}}</td>
      <td>{{ $m -> masuk }}</td>
      <td>{{ $m -> keluar }}</td>
      <td>{{ $m -> created_at }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Modal -->
@endsection