

<?php $__env->startSection('title', 'Ubah Foto Profil'); ?>

<?php $__env->startSection('sidebar-content'); ?>
    <?php if(Auth::user()->role == 'Admin'): ?>
        <li class="nav-item">
            <a href="/" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/agama24" class="nav-link">
                <i class="nav-icon fas fa-praying-hands"></i>
                <p>Agama</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/approval24" class="nav-link">
                <i class="nav-icon fas fa-user-check"></i>
                <p>User Approval</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/details24" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Detail User</p>
            </a>
        </li>
    <?php else: ?>
        <li class="nav-item">
            <a href="/" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/detail24" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Detail Data</p>
            </a>
        </li>
    <?php endif; ?>
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
            <a href="/profile24" class="btn btn-dark">Profile</a>
            <a href="/logout24" class="btn btn-danger float-right">Logout</a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header', 'UAS Praktik Pemrograman Backend'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary d-flex flex-fill">
                <div class="card-header">
                    <h3 class="card-title">Foto Profil</h3>
                </div>
                <div class="card-body">
                    <form action="/image24" method="post" id="inputForm" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="upload_image">Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload_image" name="upload_image" >
                                        <label class="custom-file-label" for="upload_image">Pilih foto</label>
                                    </div>
                                </div>
                                <?php $__errorArgs = ['upload_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="/profile24" class="btn btn-secondary">Batal</a>
                                <input type="submit" name="submit" value="Ubah" class="btn btn-success float-right">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\PRAK_BACKEND\laravel-uas\resources\views/auth/profilepic.blade.php ENDPATH**/ ?>