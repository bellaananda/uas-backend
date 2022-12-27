

<?php $__env->startSection('title', 'Tambah Detail'); ?>

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
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Detail Data</h3>
        </div>
        <div class="card-body">
            <form action="/detail24" method="post" id="inputForm" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="birthplace">Tempat Lahir</label>
                            <input type="text" id="birthplace" name="birthplace" class="form-control" placeholder="Tempat Lahir" value="<?php echo e(old('birthplace')); ?>" required>
                            <?php $__errorArgs = ['birthplace'];
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
                            <label for="birthdate">Tanggal Lahir</label>
                            <input type="date" id="birthdate" name="birthdate" class="form-control" placeholder="Tanggal Lahir" value="<?php echo e(old('birthdate')); ?>" required>
                            <?php $__errorArgs = ['birthdate'];
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
                            <label for="agama">Agama</label>
                            <select id="agama" name="agama" class="form-control custom-select" required>
                                <option selected disabled>Pilih Satu</option>
                                <?php $__currentLoopData = $agama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['agama'];
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea id="address" name="address" class="form-control" rows="4" placeholder="Alamat" required><?php echo e(old('address')); ?></textarea>
                            <?php $__errorArgs = ['address'];
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
                            <label for="foto-ktp">Foto ktp</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto-ktp" name="foto-ktp" required>
                                    <label class="custom-file-label" for="foto-ktp">Pilih foto</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="/detail24" class="btn btn-secondary">Batal</a>
                        <input type="submit" name="submit" value="Tambahkan" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\PRAK_BACKEND\laravel-uts\resources\views/user/detail/add.blade.php ENDPATH**/ ?>