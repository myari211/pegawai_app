<?php $__env->startSection('content'); ?>
<table class="table table-dark bg-gradient table-striped" style="margin-top:-25px">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Departement</th>
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
  <?php
    $i = 1;
  ?>
  <?php $__currentLoopData = $departement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e($i++); ?></th>
      <td><?php echo e($d -> kode_departement); ?></td>
      <td><?php echo e($d -> departement); ?></td>
      <td class="d-flex justify-content-end">
        <button type="button" class="btn btn-warning bg-gradient mr-2 d-inline-flex align-items-center" data-toggle="modal" data-target="#edit_departement<?php echo e($d -> id_departement); ?>">
            <i class="material-icons">create</i>
            &nbsp;Edit
        </button>
        <button type="button" class="btn btn-danger bg-gradient align-item-center d-inline-flex align-items-center" data-toggle="modal" data-target="#delete_departement<?php echo e($d -> id_departement); ?>">
            <i class="material-icons">delete</i>
            &nbsp;delete
        </button>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($departement->count() + 1); ?>">
                <div class="row">
                    <label for="kode_departement">Kode Departement</label>
                    <input type="text" name="kode_departement" id="departement" class="form-control">
                </div>
                <div class="row">
                    <label for="department">Departement</label>
                    <input type="text" name="departement" id="department" class="form-control">
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

<?php $__currentLoopData = $departement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="edit_departement<?php echo e($d -> id_departement); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($d -> id_departement); ?>">
                <div class="row">
                  <label for="kode_departement">Kode Departement</label>
                  <input type="text" name="kode_departement" id="kode_departement" class="form-control" value="<?php echo e($d -> kode_departement); ?>">
                </div>
                <div class="row">
                    <label for="department">Departement</label>
                    <input type="text" name="departement" id="department" class="form-control" value="<?php echo e($d -> departement); ?>">
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

<div class="modal fade" id="delete_departement<?php echo e($d -> id_departement); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($d -> id_departement); ?>">
                <div class="row">
                    <p>Apakah anda yakin akan menghapus data ini ?</p>
                </div>
                <div class="row">
                    <p><?php echo e($d -> departement); ?></p>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /pegawai_vue/laravel/resources/views/department.blade.php ENDPATH**/ ?>