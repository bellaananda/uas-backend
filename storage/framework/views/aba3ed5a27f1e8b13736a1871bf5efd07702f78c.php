

<?php $__env->startSection('title', 'User Approval'); ?>

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
        <a href="/approval24" class="nav-link active">
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
                    <div class="card-title"><h3>User Approval</h3></div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive table-hover" id="tablePenduduk">
                        <table class="table m-0 align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index+1); ?></td>
                                    <td><?php echo e($item['name']); ?></td>
                                    <td><?php echo e($item['email']); ?></td>
                                    <td><?php echo e($item['role']); ?></td>
                                    <td>
                                        <?php if($item['is_active'] == 1): ?>
                                            <span class="badge badge-success">Aktif</span>
                                        <?php else: ?>
                                            <span class="badge badge-secondary">Belum Aktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item['is_active'] == 1): ?>
                                            <a class="btn btn-danger" id="btn-modal" onclick="changeApprovalStatus(<?php echo e($item['id']); ?>)"><i class="fa fa-sync"></i>&nbsp; Disapprove</a>
                                        <?php else: ?>
                                            <a class="btn btn-danger" id="btn-modal" onclick="changeApprovalStatus(<?php echo e($item['id']); ?>)"><i class="fa fa-sync"></i>&nbsp; Approve</a>
                                        <?php endif; ?>
                                        <div class="modal fade" id="modal-default">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">
                                                            <i class="fas fa-exclamation text-danger"></i>&nbsp;
                                                            Anda yakin ingin mengubah status user ini?
                                                        </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post" action="/approval24">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <input type="hidden" name="id" id="id" />
                                                                <input type="submit" value="Ubah" class="btn btn-danger">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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
        function changeApprovalStatus(par) {
            document.getElementById("id").value = par;
            $("#modal-default").modal();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\PRAK_BACKEND\laravel-uas\resources\views/admin/approval.blade.php ENDPATH**/ ?>