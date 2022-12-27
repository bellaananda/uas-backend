

<?php $__env->startSection('title', 'Profil'); ?>

<?php $__env->startSection('sidebar-content'); ?>
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
            <a href="#" class="btn btn-dark">Profile</a>
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
    <?php if(Session::has('error_message')): ?>
        <div class="modal fade" id="error-message">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <i class="fas fa-exclamation text-danger"></i>&nbsp;
                            <?php echo e(session('error_message')); ?>

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
        <div class="col-md-5">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    Profil
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="lead title"><b><?php echo e(Auth::user()->name); ?></b></h2>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <b>Email : &nbsp;</b><?php echo e(Auth::user()->email); ?></li>
                            </ul>
                        </div>
                        <div class="col-5 text-right">
                            <?php if(Auth::user()->photo == null): ?>
                                <img src="<?php echo e(URL('./dist/img/user.png')); ?>" alt="user-avatar" class="img-circle img-fluid" height="120" width="120">
                            <?php else: ?>
                                <img src="<?php echo e(URL('./uploads/profile/' . Auth::user()->photo)); ?>" alt="user-avatar" class="img-circle img-fluid" height="120" width="120">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a href="/password24" class="btn btn-sm bg-teal">
                            Ubah password
                        </a>
                        <a href="/image24" class="btn btn-sm btn-primary">
                            Ubah foto profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <?php if(Session::has('error_message')): ?>
        <script>
            $(document).ready(function(){
                $("#error-message").modal();
            }); 
        </script>
    <?php endif; ?>
    <?php if(Session::has('success_message')): ?>
        <script>
            $(document).ready(function(){
                $("#success-message").modal();
            }); 
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\PRAK_BACKEND\laravel-uas\resources\views/user/profile.blade.php ENDPATH**/ ?>