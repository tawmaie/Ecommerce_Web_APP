

<?php $__env->startSection('content'); ?>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Product List</h1>
            </div>
            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>
            <div class="container-md">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col d-flex justify-content-end">
                        <input type="text" placeholder="Search.." style="border-radius: 2px">
                        <button type="button" class="btn btn-outline-primary">
                            Search
                        </button>
                    </div>
                </div>
                
                <table class="table table-bordered mt-5">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="170">Action</th>
                    </tr>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->role); ?></td>
                            <td>
                                <form action="<?php echo e(route('user.destroy', $user->id)); ?>" method="POST">
                                    <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="btn btn-warning">EDIT</a>
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/user/index.blade.php ENDPATH**/ ?>