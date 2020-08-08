<?php $__env->startSection('content'); ?>
<div class="container">
    <?php $__currentLoopData = $profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="width:15rem; height:15rem">
                <div class="card-body p-1">
                    <div class="d-flex justify-content-end align-items-end p-0 m-0">
                        <button type="button" class="btn btn-transparent p-0" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="material-icons text-secondary">create</i>
                        </button>
                    </div>
                    <img class="rounded" src="">
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card" style="height:15rem">
                <div class="card-body">
                    <div class="row">
                        <div class="d-inline-flex justify-content-between">
                            <p class="h2"><?php echo e($p -> nama); ?></p>
                            <span class="badge bg-primary d-inline-flex align-items-center p-2" style="font-size:15px">
                                <?php echo e($p -> jabatan); ?>&nbsp;
                                <i class="material-icons">bookmark</i>
                            </span>
                        </div>
                        <p class="h5 text-secondary"><?php echo e($p -> departement); ?> - (<?php echo e($p -> kode_departement); ?>)</p>
                        <p class="h6 text-danger"><?php echo e($p -> email); ?></p>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center">
                    <span class="badge bg-success rounded-circle mb-3 ml-3">&nbsp;&nbsp;</span>
                    <p>&nbsp;<?php echo e($p -> status); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-3">
            <div class="card" style="height:20rem; width:15rem">
                <div class="card-body">
                    <div class="row text-center mt-2">
                        <p class="h5">Information Detail</p>
                    </div>
                    <div class="row mt-4">
                        <label for="tgl_lahir" class="h6">Tanggal Lahir :</label>
                        <p class="h6" id="tgl_lahir"><?php echo e($p->tgl_lahir); ?></p>
                    </div>
                    <div class="row mt-2">
                        <label for="jenis_kelamin">Jenis Kelamin :</label>
                        <p class="h6" id="jenis_kelamin"><?php echo e($p -> jenis_kelamin); ?></p>
                    </div>
                    <div class="row mt-2">
                        <label for="nomor">Nomor HP :</label>
                        <p class="h6" id="nomor">+62 <?php echo e($p -> nomor_hp); ?></p>
                    </div>
                    <div class="row mt-2">
                        <label for="alamat">Alamat :</label>
                        <p class="h6" id="alamat"><?php echo e($p -> alamat); ?></p>
                    </div>
                </div>
            </div>        
        </div>
        <div class="col-md-9">
            <div class="card" style="height:15rem">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="staticBackdropLabel">Upload Avatar</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="form-file">
                <form action = "/profile/foto" method="post" enctype="multipart/form-data"> 
                    <?php echo e(csrf_field()); ?>

                    <input type="file" class="form-file-input" id="customFile" name="foto">
                    <label class="form-file-label" for="customFile">
                        <span class="form-file-text">Choose file...</span>
                        <span class="form-file-button btn-secondary">Browse</span>
                    </label>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Understood</button>
                </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /pegawai_vue/laravel/resources/views/profile.blade.php ENDPATH**/ ?>