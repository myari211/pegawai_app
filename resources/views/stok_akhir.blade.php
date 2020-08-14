@extends('layouts.app')
@section('content')

<table class="table table-dark bg-gradient table-striped" style="margin-top:-25px">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode Barang</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Satuan</th>
        <th scope="col">Stok Tersedia</th>
      </tr>
    </thead>
    <tbody>
    @foreach($stok as $no => $s)
      <tr>
        <th scope="row">{{ ++$no }}</th>
        <td>{{ $s -> kode_barang }}</td>
        <td>{{ $s -> nama_barang}}</td>
        <td>{{ $s -> satuan }}</td>
        <td>@number($s -> total)</td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection