<?php $__env->startSection('content'); ?>
<table class="table table-dark bg-gradient table-striped" style="margin-top:-25px">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Satuan</th>
      <th scope="col">Harga Pembelian</th>
      <th scope="col">Harga Jual</th>
      <th class="col d-flex justify-content-end">
        <button type="button" class="btn btn-primary bg-gradient rounded-pill d-inline-flex" data-toggle="modal" data-target="#tambah_barang">
            <i class="material-icons">add_circle</i>
            &nbsp;Tambah
        </button>
      </th>
    </tr>
  </thead>
  <tbody>
  <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e(++$no); ?></th>
      <td><?php echo e($b -> kode_barang); ?></td>
      <td><?php echo e($b -> nama_barang); ?></td>
      <td><?php echo e($b -> satuan); ?></td>
      <td><?php echo e($b -> harga_pembelian); ?></td>
      <td><?php echo e($b -> harga_jual); ?></td>
      <td class="d-flex justify-content-end">
        <button type="button" class="btn btn-warning bg-gradient d-inline-flex align-items-center" data-toggle="modal" data-target="#edit_barang<?php echo e($b -> id); ?>">
            <i class="material-icons">create</i>
        </button>
        <div class="btn-group-left pl-2 pr-2" role="group">
          <button id="btnGroupDrop" type="button" class="btn btn-secondary bg-gradient dropdown-toggle d-flex align-items-center" data-toggle="dropdown" aria-expanded="false">
            <i class="material-icons">reorder</i>
          </button>
          <div class="dropdown-menu pr-4 pl-4" aria-labelledby="btnGroupDrop1">
            <div class="row">
              <button type="button" class="btn btn-success d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#mutasi_masuk<?php echo e($b -> id); ?>">
                  Mutasi Masuk
                  <i class="material-icons">vertical_align_bottom</i>
              </button>
            </div>
            <div class="row mt-2">
              <button type="button" class="btn btn-danger d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#mutasi_keluar<?php echo e($b -> id); ?>">
                  Mutasi Keluar
                  <i class="material-icons">vertical_align_top</i>
              </button>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-danger bg-gradient align-item-center d-inline-flex align-items-center" data-toggle="modal" data-target="#delete_barang<?php echo e($b -> id); ?>">
            <i class="material-icons">delete</i>
        </button>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary bg-gradient d-inline-flex">
        <i class="material-icons text-white">add</i>
        <h5 class="modal-title text-white" id="exampleModalLabel">
            Tambah Barang
        </h5>
        <button type="button" class="close text-white d-flex align-items-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="/barang/add">
                <?php echo csrf_field(); ?>
                <input type="hidden" value="<?php echo e($barang->count() + 1); ?>" name="id">
                <div class="row">
                    <div class="col-md-6 pl-0">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" id="kode_barang">
                    </div>
                    <div class="col-md-6 pr-0">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="nama_barang">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 pl-0">
                        <label for="satuan">Satuan</label>
                        <select name="satuan" id="satuan" class="form-select">
                            <option value="kg">Kilo Gram</option>
                            <option value="lot">Lot</option>
                            <option value="pieces">Pieces</option>
                        </select>
                    </div>
                    <div class="col-md-6 pr-0">
                        <label for="harga_pembelian">Harga Pembelian</label>
                        <input type="text" name="harga_pembelian" id="harga_pembelian" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 pl-0">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="text" name="harga_jual" id="harga_jual" class="form-control">
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

<!-- mutasi -->
<?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="mutasi_masuk<?php echo e($b -> id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-success bg-gradient d-inline-flex">
        <i class="material-icons text-white">add</i>
        <h5 class="modal-title text-white" id="exampleModalLabel">
            Mutasi Barang Masuk
        </h5>
        <button type="button" class="close text-white d-flex align-items-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="/mutasi/add">
                <?php echo csrf_field(); ?>
                <input type="hidden" value="<?php echo e($mutasi->count()+1); ?>" name="id">
                <div class="row">
                <label for="nomor_transaksi">Nomor Transaksi :</label>
                  <input type="text" name="nomor_transaksi" class="form-control" id="nomor_transaksi" value="/2020/<?php echo e($b -> kode_barang); ?>/<?php echo e($mutasi -> count() + 1); ?>" readonly>
                </div>
                <div class="row">
                  <div class="col-md-6 pl-0">
                    <label for="kode_barang">Kode Barang :</label>
                    <input class="form-control" name="kode_barang" type="text"  id="kode_barang" value="<?php echo e($b -> kode_barang); ?>" aria-label="readonly input example" readonly>
                  </div>
                  <div class="col-md-6 pr-0">
                    <label for="nama_barang">Nama Barang :</label>
                    <input class="form-control" type="text" name="nama_barang"  id="nama_barang" value="<?php echo e($b -> nama_barang); ?>" aria-label="readonly input example" readonly>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-6 pl-0">
                    <label for="masuk">Barang Masuk :</label>
                    <input type="text" name="masuk" class="form-control" id="masuk">
                  </div>
                  <div class="col-md-6">
                    <label for="satuan">Satuan :</label>
                    <input type="text" name="satuan" id="satuan" class="form-control" value="<?php echo e($b -> satuan); ?>" readonly>
                  </div>
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success bg-gradient d-inline-flex shadow">
            Send&nbsp;
            <i class="material-icons ml-2">send</i>
        </button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mutasi_keluar<?php echo e($b -> id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-danger bg-gradient d-inline-flex">
        <i class="material-icons text-white">add</i>
        <h5 class="modal-title text-white" id="exampleModalLabel">
            Mutasi Barang Keluar
        </h5>
        <button type="button" class="close text-white d-flex align-items-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="/mutasi/out">
                <?php echo csrf_field(); ?>
                <input type="hidden" value="<?php echo e($mutasi->count()+1); ?>" name="id">
                <div class="row">
                <label for="nomor_transaksi">Nomor Transaksi</label>
                  <input type="text" name="nomor_transaksi" class="form-control" id="nomor_transaksi" value="/2020/<?php echo e($b -> kode_barang); ?>/<?php echo e($mutasi -> count() + 1); ?>" readonly>
                </div>
                <div class="row">
                  <div class="col-md-6 pl-0">
                    <label for="kode_barang">Kode Barang</label>
                    <input class="form-control" name="kode_barang" type="text"  id="kode_barang" value="<?php echo e($b -> kode_barang); ?>" aria-label="readonly input example" readonly>
                  </div>
                  <div class="col-md-6 pr-0">
                    <label for="nama_barang">Nama Barang</label>
                    <input class="form-control" type="text" name="nama_barang"  id="nama_barang" value="<?php echo e($b -> nama_barang); ?>" aria-label="readonly input example" readonly>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-6 pl-0">
                    <label for="keluar">Barang Keluar</label>
                    <input type="text" name="keluar" class="form-control" id="keluar">
                  </div>
                  <div class="col-md-6">
                    <label for="satuan">Satuan</label>
                    <input type="text" name="satuan" id="satuan" class="form-control" value="<?php echo e($b -> satuan); ?>" readonly>
                  </div>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /pegawai_vue/laravel/resources/views/barang.blade.php ENDPATH**/ ?>