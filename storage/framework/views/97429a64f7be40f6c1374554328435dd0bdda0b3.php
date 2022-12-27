

<?php $__env->startSection('title', 'Detail Data'); ?>

<?php $__env->startSection('sidebar-content'); ?>
    <li class="nav-item">
        <a href="/" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/detail24" class="nav-link active">
            <i class="nav-icon fas fa-user"></i>
            <p>Detail Data</p>
        </a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('profile'); ?>
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <?php if(Auth::user()->photo == null): ?>
            <img src="<?php echo e(URL('./dist/img/user.png')); ?>" class="user-image img-circle elevation-2" alt="User Image">
        <?php else: ?>
            <img src="<?php echo e(URL('./uploads/profile/' . Auth::user()->photo)); ?>"class="user-image img-circle elevation-2" alt="User Image">
        <?php endif; ?>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header bg-dark">
            <?php if(Auth::user()->photo == null): ?>
                <img src="<?php echo e(URL('./dist/img/user.png')); ?>" class="img-circle elevation-2" alt="User Image">
            <?php else: ?>
                <img src="<?php echo e(URL('./uploads/profile/' . Auth::user()->photo)); ?>" class="img-circle elevation-2" alt="User Image">
            <?php endif; ?>
            <p>
                <?php echo e(strtoupper(Auth::user()->name)); ?>

                <small><?php echo e(Auth::user()->role); ?></small>
            </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <a href="/profile24/<?php echo e(Auth::user()->id); ?>" class="btn btn-dark">Profile</a>
            <a href="/logout24" class="btn btn-danger float-right">Logout</a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header', 'UTS Praktik Pemrograman Backend'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Session::has('success_message')): ?>
        <div class="modal fade" id="success-message">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <i class="fas fa-check text-info"></i>&nbsp;
                            <?php echo e(session('success_message')); ?>

                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-info">
                <div class="card-header border-transparent">
                    <div class="card-title"><h3>Detail Data</h3></div>
                    <?php if($status == 1): ?>
                        <div class="card-tools">
                            <input type="hidden" name="id" id="id" value="<?php echo e($detail->id); ?>" />
                            <a href="/detail24/<?php echo e($detail->id); ?>/edit" type="button" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a type="button" class="btn btn-danger" id="btn-modal" onclick="showDelete(<?php echo e($detail->id); ?>)">
                                <i class="fas fa-trash"></i>
                            </a>
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                <i class="fas fa-trash text-danger"></i>&nbsp;
                                                Anda yakin ingin menghapus data ini?
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post" action="/detail24/<?php echo e($detail->id); ?>/delete">
                                            <?php echo csrf_field(); ?>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <input type="hidden" name="id2" id="id2" />
                                                <input type="submit" value="Hapus" class="btn btn-danger">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?php if($status == 0): ?>
                        <div class="row pt-lg-5">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 text-center"><h4>Belum ada data</h4></div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row  mb-5 pb-lg-5">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 text-center mb-3"><a class="btn btn-primary" href="/detail24/create">Tambah sekarang</a></div>
                            <div class="col-md-2"></div>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" value="<?php echo e(Auth::user()->name); ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="birthplace">Tempat Lahir</label>
                                    <input type="text" class="form-control" value="<?php echo e($detail->birth_place); ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="birthdate">Tanggal Lahir</label>
                                    <input type="text" class="form-control" value="<?php echo e(date('j F Y', strtotime($detail->birth_date))); ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" class="form-control" value="<?php echo e($detail->agama); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea class="form-control" rows="4" disabled><?php echo e($detail->address); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="foto-ktp">Foto KTP</label><br>
                                    <img src="<?php echo e(URL('./uploads/ktp/' . $detail->foto_ktp)); ?>" class="img rounded" alt="Foto KTP" width="243" height="153">
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <?php if(Session::has('success_message')): ?>
        <script>
            $(document).ready(function(){
                $("#success-message").modal();
            }); 
        </script>
    <?php endif; ?>
    <script>
        function showDelete(par) {
            document.getElementById("id2").value = par;
            $("#modal-default").modal();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\PRAK_BACKEND\laravel-uts\resources\views/user/detail/index.blade.php ENDPATH**/ ?>