

<?php $__env->startSection('title', 'Ubah Password'); ?>

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
            <a href="/profile24/<?php echo e(Auth::user()->id); ?>" class="btn btn-dark">Profile</a>
            <a href="/logout24" class="btn btn-danger float-right">Logout</a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header', 'UTS Praktik Pemrograman Backend'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary d-flex flex-fill">
                <div class="card-header">
                    <h3 class="card-title">Form Ubah Password</h3>
                </div>
                <div class="card-body">
                    <form action="/password24" method="post" id="inputForm" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="newpass">Password Baru</label>
                                <input type="password" id="newpass" name="newpass" class="form-control" placeholder="Password Baru" value="<?php echo e(old('newpass')); ?>" required>
                                <?php $__errorArgs = ['newpass'];
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
                            <div class="form-group">
                                <label for="confirmpass">Konfirmasi Password Baru</label>
                                <input type="password" id="confirmpass" name="confirmpass" class="form-control" placeholder="Konfirmasi Password Baru" value="<?php echo e(old('confirmpass')); ?>" required>
                                <?php $__errorArgs = ['confirmpass'];
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
                                <a href="/profile24/<?php echo e(Auth::user()->id); ?>" class="btn btn-secondary">Batal</a>
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
<?php echo $__env->make('../layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\PRAK_BACKEND\laravel-uts\resources\views/auth/password.blade.php ENDPATH**/ ?>