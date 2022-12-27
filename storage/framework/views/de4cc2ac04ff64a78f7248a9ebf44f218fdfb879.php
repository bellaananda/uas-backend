

<?php $__env->startSection('title', 'Detail Data User'); ?>

<?php $__env->startSection('sidebar-content'); ?>
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
        <a href="/details24" class="nav-link active">
            <i class="nav-icon fas fa-users"></i>
            <p>Detail User</p>
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
            <a href="/profile24" class="btn btn-dark">Profile</a>
            <a href="/logout24" class="btn btn-danger float-right">Logout</a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header', 'UAS Praktik Pemrograman Backend'); ?>

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
                    <div class="card-tools">
                        <?php if($data['photo'] == null): ?>
                            <img src="<?php echo e(URL('./dist/img/user.png')); ?>" class="img-circle elevation-2" alt="User Image" width="50" height="50">
                        <?php else: ?>
                            <img src="<?php echo e(URL('./uploads/profile/' . $data['photo'])); ?>" class="img-circle elevation-2" alt="User Image" width="50" height="50">
                        <?php endif; ?>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" value="<?php echo e($data['name']); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="<?php echo e($data['email']); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="birthplace">Tempat Lahir</label>
                                <input type="text" class="form-control" value="<?php echo e($data['birthplace']); ?>" disabled>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="birthdate">Tanggal Lahir</label>
                                        <input type="text" class="form-control" value="<?php echo e(date('j F Y', strtotime($data['birthdate']))); ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="age">Usia</label>
                                        <input type="text" class="form-control" value="<?php echo e($data['age']); ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input type="text" class="form-control" value="<?php echo e($data['agama']); ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>&nbsp;
                                <?php if($data['status'] == 1): ?>
                                    <span class="badge badge-success">Aktif</span>
                                <?php else: ?>
                                    <span class="badge badge-secondary">Belum Aktif</span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea class="form-control" rows="4" disabled><?php echo e($data['address']); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="foto-ktp">Foto KTP</label><br>
                                <img src="<?php echo e(URL('./uploads/ktp/' . $data['ktp'])); ?>" class="img rounded" alt="Foto KTP" width="243" height="153">
                            </div>
                        </div>
                    </div>
                    <!-- /.table-responsive -->
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
<?php echo $__env->make('../layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\PRAK_BACKEND\laravel-uas\resources\views/admin/datadetails.blade.php ENDPATH**/ ?>