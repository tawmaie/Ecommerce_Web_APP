

<?php $__env->startSection('content'); ?>
    <div class="container">
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
                <a href="<?php echo e(route('type.create')); ?>" class="btn btn-success">Add Product</a>
                <table class="table table-bordered mt-5">
                    <tr>
                        <th width='200'>Type Name</th>
                        <th>Description</th>
                        <th width='170'>Action</th>
                    </tr>
                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($type->type_name); ?></td>
                            <td><?php echo e($type->description); ?></td>
                            <td>
                                <form action="" method="POST">
                                    <a href="" class="btn btn-warning">EDIT</a>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/type/index.blade.php ENDPATH**/ ?>