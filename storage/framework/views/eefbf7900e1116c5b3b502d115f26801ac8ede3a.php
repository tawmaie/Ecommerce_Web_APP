


<?php $__env->startSection('content'); ?>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Shop List</h1>
            </div>
            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>
            <div class="container-md">
                <?php echo e($shops->withQueryString()->links()); ?>

                <table class="table table-bordered mt-5">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="250px">Action</th>
                    </tr>
                    <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($shop->name); ?></td>
                            <td><?php echo e($shop->description); ?></td>
                            <td><a href="<?php echo e(route('shops.product.index', [
                                'shop' => $shop->getKey(),
                            ])); ?>"
                                    class="btn btn-warning">All Product</a>
                                
                                <a href="<?php echo e(route('shops.type.index', [
                                        'shop' => $shop->getKey(),
                                    ])); ?>"
                                        class="btn btn-warning">Edit Type</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/shop/ownerShop.blade.php ENDPATH**/ ?>