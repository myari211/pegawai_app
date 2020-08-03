@extends('layouts.app')
@section('content')
<table class="table table-dark bg-gradient table-striped" style="margin-top:-25px">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Department</th>
      <th class="col d-flex justify-content-end">
        <button type="button" class="btn btn-primary bg-gradient rounded-pill d-inline-flex" data-toggle="modal" data-target="#tambah_pegawai">
            <i class="material-icons">add</i>
            Tambah
        </button>
      </th>
    </tr>
  </thead>
  <tbody>
  @php
    $i = 1;
  @endphp
  @foreach($departemen as $d)
    <tr>
      <th scope="row">{{ $i++ }}</th>
      <td>{{ $d -> departement }}</td>
      <td class="d-flex justify-content-end">
        <button type="button" class="btn btn-warning bg-gradient rounded-pill mr-2 d-inline-flex align-items-center" data-toggle="modal" data-target="#edit_departement{{ $d -> id }}">
            <i class="material-icons">create</i>
            &nbsp;Edit
        </button>
        <button type="button" class="btn btn-danger bg-gradient rounded-pill align-item-center d-inline-flex align-items-center" data-toggle="modal" data-target="#delete_departement{{ $d -> id }}">
            <i class="material-icons">delete</i>
            &nbsp;delete
        </button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="tambah_pegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary bg-gradient d-inline-flex">
        <i class="material-icons text-white">add</i>
        <h5 class="modal-title text-white" id="exampleModalLabel">
            Tambah Pegawai
        </h5>
        <button type="button" class="close text-white d-flex align-items-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="/departement/add">
                @csrf
                <div class="row">
                    <label for="department">Departement</label>
                    <input type="text" name="departemen" id="department" class="form-control">
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary bg-gradient d-inline-flex shadow">
            Send&nbsp;
            <i class="material-icons ml-2">send</i>
        </button>
        </form>
      </div>
    </div>
  </div>
</div>

@foreach($departemen as $d)
<div class="modal fade" id="edit_departement{{$d -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning bg-gradient d-inline-flex">
        <i class="material-icons">create</i>
        <h5 class="modal-title" id="exampleModalLabel">
            &nbsp; Edit Departement
        </h5>
        <button type="button" class="close text-white d-flex align-items-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="/departement/edit">
                @csrf
                <input type="hidden" name="id" value="{{ $d -> id }}">
                <div class="row">
                    <label for="department">Departement</label>
                    <input type="text" name="departemen" id="department" class="form-control" value="{{ $d -> departement }}">
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning bg-gradient d-inline-flex shadow">
            Send&nbsp;
            <i class="material-icons ml-2">send</i>
        </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delete_departement{{$d -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger bg-gradient d-inline-flex">
        <i class="material-icons">create</i>
        <h5 class="modal-title text-white" id="exampleModalLabel">
            &nbsp; Delete Departement
        </h5>
        <button type="button" class="close text-white d-flex align-items-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="get" action="/departement/delete">
                @csrf
                <input type="hidden" name="id" value="{{ $d -> id }}">
                <div class="row">
                    <p>Apakah anda yakin akan menghapus data ini ?</p>
                </div>
                <div class="row">
                    <p>{{ $d -> departement }}</p>
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger bg-gradient d-inline-flex shadow">
            Send&nbsp;
            <i class="material-icons ml-2">send</i>
        </button>
        </form>
      </div>
    </div>
  </div>
</div>

@endforeach
@endsection