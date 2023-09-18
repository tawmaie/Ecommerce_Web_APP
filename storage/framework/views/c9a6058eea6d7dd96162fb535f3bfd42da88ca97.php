

<?php $__env->startSection('content'); ?>
    <h1 class="text-center">All Shop</h1>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card mt-5" style="border-radius: 10px; ">
                        <img class="card-img-top" src="<?php echo e(asset($shop->logo)); ?>" alt="Card image cap" style="border-radius: 50%">
                        <div class="card-body text-center">
                            <h4 class="card-body"><a href="<?php echo e(route('showHome',$shop->getKey())); ?>" title="View Product"><?php echo e($shop->name); ?></a></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/Home/AllShop.blade.php ENDPATH**/ ?>