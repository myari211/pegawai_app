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
      <th class="col d-flex justify-content-end">
        <button type="button" class="btn btn-primary bg-gradient rounded-pill d-inline-flex" data-toggle="modal" data-target="#tambah_barang">
            <i class="material-icons">add</i>
            Tambah
        </button>
      </th>
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
      <td class="d-flex justify-content-end">
        <button type="button" class="btn btn-warning bg-gradient mr-2 d-inline-flex align-items-center" data-toggle="modal" data-target="#edit_barang{{ $m -> id }}">
            <i class="material-icons">create</i>
        </button>
        <button type="button" class="btn btn-danger bg-gradient align-item-center d-inline-flex align-items-center" data-toggle="modal" data-target="#delete_barang{{ $m -> id }}">
            <i class="material-icons">delete</i>
        </button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Modal -->
@endsection