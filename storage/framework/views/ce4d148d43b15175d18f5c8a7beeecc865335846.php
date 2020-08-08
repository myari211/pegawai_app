<?php $__env->startSection('content'); ?>
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
  <?php $__currentLoopData = $mutasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e(++$no); ?></th>
      <td><?php echo e($m -> kode_barang); ?></td>
      <td><?php echo e($m -> nama_barang); ?></td>
      <td><?php echo e($m -> masuk); ?></td>
      <td><?php echo e($m -> keluar); ?></td>
      <td><?php echo e($m -> created_at); ?></td>
      <td class="d-flex justify-content-end">
        <button type="button" class="btn btn-warning bg-gradient mr-2 d-inline-flex align-items-center" data-toggle="modal" data-target="#edit_barang<?php echo e($m -> id); ?>">
            <i class="material-icons">create</i>
        </button>
        <button type="button" class="btn btn-danger bg-gradient align-item-center d-inline-flex align-items-center" data-toggle="modal" data-target="#delete_barang<?php echo e($m -> id); ?>">
            <i class="material-icons">delete</i>
        </button>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

<!-- Modal -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /pegawai_vue/laravel/resources/views/mutasi.blade.php ENDPATH**/ ?>