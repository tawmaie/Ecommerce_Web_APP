

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-md-12 text-center">
            <h1>Product Type</h1>
        </div>
        <div class="card my-4">
            <div class="card-header">
                Create Type
            </div>
            <div class="card-body">
                <form action=" <?php echo e(route('shops.type.store', (array) Route::current()->parameters())); ?> " method="POST"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Type Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="<?php echo e(old('name')); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5"><?php echo e(old('description')); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href=" <?php echo e(route('shops.type.index', (array) Route::current()->parameters())); ?> "
                        class="btn btn-danger">Cancle</a>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/product/type/create.blade.php ENDPATH**/ ?>