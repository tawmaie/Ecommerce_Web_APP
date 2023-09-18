

<?php $__env->startSection('content'); ?>
    <h1 class="text-center">Register</h1>
    <div class="container-lg  align-middle">
        <div class="card mx-auto" style="width: 350px;">
            <div class="card-body">
                <form action="<?php echo e(route('ownerupdateshop',$shop->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Shop Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo e($shop->name); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Your Shop Logo</label>
                        <input class="form-control" type="file" id="logo" name="logo">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/shop/ownerupdate.blade.php ENDPATH**/ ?>