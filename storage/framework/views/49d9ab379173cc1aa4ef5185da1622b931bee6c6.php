

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
                        <a href=" <?php echo e(route('shops.product.create', (array) Route::current()->parameters())); ?> "
                        class="btn btn-success">Add Product</a>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <input type="text" placeholder="Search.." style="border-radius: 2px">
                        <button type="button" class="btn btn-outline-primary">
                            Search
                        </button>
                    </div>
                </div>
                <?php echo e($products->withQueryString()->links()); ?>

                <table class="table table-bordered mt-5">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th width="170">Action</th>
                    </tr>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img src="<?php echo e(asset($product->img)); ?>" style="width: 100px" alt=""></td>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->description); ?></td>
                            <td><?php echo e($product->type->name); ?></td>
                            <td><?php echo e($product->stock); ?></td>
                            <td><?php echo e($product->price); ?></td>
                            <td>
                                <form
                                    action=" <?php echo e(route('shops.product.destroy', [...((array) Route::current()->parameters()), 'product' => $product->id])); ?> "
                                    method="POST">
                                    <a href=" <?php echo e(route('shops.product.edit', [...((array) Route::current()->parameters()), 'product' => $product->id])); ?> "
                                        class="btn btn-warning">EDIT</a>
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

<?php echo $__env->make('layouts.owner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/product/index.blade.php ENDPATH**/ ?>