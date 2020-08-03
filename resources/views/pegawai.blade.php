@extends('layouts.app')
@section('content')
<table class="table table-dark bg-gradient table-striped" style="margin-top:-25px">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Department</th>
      <th scope="col">Jabatan</th>
      <th class="col d-flex justify-content-end">
        <button type="button" class="btn btn-primary bg-gradient rounded-pill d-inline-flex" data-toggle="modal" data-target="#tambah_pegawai">
            <i class="material-icons">add</i>
            Tambah
        </button>
      </th>
    </tr>
  </thead>
  <tbody>
  @foreach($pegawai as $no => $p)
    <tr>
      <!-- <th scope="row"> ++$no + ($jabatan->currentPage()-1) * $jabatan->perPage() </th> -->
      <th scope="row">{{ ++$no }}</th>
      <td>{{ $p -> nama }}</td>
      <td>{{ $p->departement->departement }}</td>
      <td>{{ $p->jabatan->jabatan }}</td>
      <td class="d-flex justify-content-end">
        <button type="button" class="btn btn-warning bg-gradient rounded-pill mr-2 d-inline-flex align-items-center" data-toggle="modal" data-target="#edit_pegawai{{ $p -> id }}">
            <i class="material-icons">create</i>
            &nbsp;Edit
        </button>
        <button type="button" class="btn btn-danger bg-gradient rounded-pill align-item-center d-inline-flex align-items-center" data-toggle="modal" data-target="#delete_pegawai{{ $p -> id }}">
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
  <div class="modal-dialog modal-dialog-scrollable">
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
            <form method="post" action="/pegawai/add">
                @csrf
                <div class="row">
                  <label for="nama">Nama :</label>
                  <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="row mt-2">
                  <label for="email">E-mail :</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="row mt-2">
                  <div class="col-md-6 pl-0 pr-1">
                    <label for="tgl_lahir">Tanggal Lahir :</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                  </div>
                  <div class="col-md-6 pr-0 pl-1">
                    <label for="jenis_kelamin">Gender :</label>
                    <select name="jenis_kelamin" class="form-select">
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-6 pl-0 pr-1">
                    <label for="department">Department</label>
                    <select name="department" class="form-select" id="department">
                      @foreach($departement as $d)
                      <option value="{{ $d -> id }}">{{ $d -> departement }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 pl-1 pr-0">
                    <label for="jabatan">Jabatan :</label>
                    <select name="jabatan" class="form-select">
                    @foreach($jabatan as $j)
                      <option value="{{ $j -> id }}">{{ $j -> jabatan }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mt-2">
                  <label for="no">Nomor Hp :</label>
                  <div class="input-group p-0">
                    <span class="input-group-text" id="inputGroup-sizing-default">+62</span>
                    <input type="text" class="form-control" name="nomor" id="no" aria-label="Sizing Example Input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="row mt-2">
                  <label for="alamat">Alamat :</label>
                  <textarea name="alamat" class="form-control" id="alamat"></textarea>
                </div>
                <div class="row mt-4">
                  <div class="col-md-6 pl-0">
                    <label for="status">Status :</label>
                    <select name="status" id="status" class="form-select">
                      <option value="Aktif">Aktif</option>
                      <option value="Non Aktif">Non Aktif</select>
                    </select>
                  </div>
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

@foreach($pegawai as $p)
<div class="modal fade" id="edit_pegawai{{ $p -> id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-warning bg-gradient d-inline-flex">
        <i class="material-icons">create</i>
        <h5 class="modal-title" id="exampleModalLabel">
            &nbsp;Edit Data Pegawai
        </h5>
        <button type="button" class="close text-white d-flex align-items-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="/pegawai/edit">
                @csrf
                <input type="hidden" name="id" value="{{ $p -> id }}">
                <div class="row">
                  <label for="nama">Nama :</label>
                  <input type="text" name="nama" id="nama" class="form-control"  value="{{ $p -> nama }}">
                </div>
                <div class="row mt-2">
                  <label for="email">E-mail :</label>
                  <input type="email" name="email" id="email" class="form-control" value="{{ $p -> email }}">
                </div>
                <div class="row mt-2">
                  <div class="col-md-6 pl-0 pr-1">
                    <label for="tgl_lahir">Tanggal Lahir :</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="{{ $p -> tgl_lahir }}">
                  </div>
                  <div class="col-md-6 pr-0 pl-1">
                    <label for="jenis_kelamin">Gender :</label>
                    <select name="jenis_kelamin" class="form-select">
                      <option value="{{ $p -> jenis_kelamin }}">{{ $p -> jenis_kelamin }}</option>
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-6 pl-0 pr-1">
                    <label for="department">Department</label>
                    <select name="department" class="form-select" id="department">
                      <option value="{{ $p -> kode_departement }}">{{ $p -> departement -> departement }}</option>
                      @foreach($departement as $d)
                      <option value="{{ $d -> id }}">{{ $d -> departement }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 pl-1 pr-0">
                    <label for="jabatan">Jabatan :</label>
                    <select name="jabatan" class="form-select">
                      <option value="{{ $p -> kode_jabatan }}" class="disable">{{ $p -> jabatan -> jabatan }}</option>
                    @foreach($jabatan as $j)
                      <option value="{{ $j -> id }}">{{ $j -> jabatan }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mt-2">
                  <label for="no">Nomor Hp :</label>
                  <div class="input-group p-0">
                    <span class="input-group-text" id="inputGroup-sizing-default">+62</span>
                    <input type="text" class="form-control" name="nomor" id="no" aria-label="Sizing Example Input" aria-describedby="inputGroup-sizing-default" value="{{ $p -> nomor_hp }}">
                  </div>
                </div>
                <div class="row mt-2">
                  <label for="alamat">Alamat :</label>
                  <input name="alamat" class="form-control" id="alamat" value="{{ $p -> alamat }}">
                </div>
                <div class="row mt-4">
                  <div class="col-md-6 pl-0">
                    <label for="status">Status :</label>
                    <select name="status" id="status" class="form-select">
                      <option value="{{ $p -> status }}">{{ $p -> status }}</option>
                      <option value="Aktif">Aktif</option>
                      <option value="Non Aktif">Non Aktif</select>
                    </select>
                  </div>
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning bg-gradient d-inline-flex shadow">
            <i class="material-icons">create</i>
            Update
        </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delete_pegawai{{$p -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger bg-gradient d-inline-flex">
        <i class="material-icons text-white">delete</i>
        <h5 class="modal-title text-white" id="exampleModalLabel">
            &nbsp; Hapus Data Pegawai
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
                  <div class="col-md-6">
                    <p>Nama : </p>
                  </div>
                  <div class="col-md-6">
                    <p>{{ $p -> nama }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <p>Departement : </p>
                  </div>
                  <div class="col-md-6">
                    <p>{{ $p -> departement -> departement }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <p>Jabatan : </p>
                  </div>
                  <div class="col-md-6">
                    <p>{{ $p -> jabatan -> jabatan }}</p>
                  </div>
                </div>
                <div class="row">
                  <p class="h6">Dan data yang terkait ?</p>
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger bg-gradient d-inline-flex shadow">
          <i class="material-icons">delete</i>
            Delete
        </button>
        </form>
      </div>
    </div>
  </div>
</div>

@endforeach
@endsection