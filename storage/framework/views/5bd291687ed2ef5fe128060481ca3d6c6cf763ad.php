<?php $__env->startSection('content'); ?>

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
    <?php $__currentLoopData = $stok; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <th scope="row"><?php echo e(++$no); ?></th>
        <td><?php echo e($s -> kode_barang); ?></td>
        <td><?php echo e($s -> nama_barang); ?></td>
        <td><?php echo e($s -> satuan); ?></td>
        <td><?php echo number_format($s -> total,0,',','.'); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /pegawai_vue/laravel/resources/views/stok_akhir.blade.php ENDPATH**/ ?>