

<?php $__env->startSection('content'); ?>


<link rel="stylesheet" href="<?php echo e(asset('css/product1.css')); ?>">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md">
                    <div class="preview-pic">
                        <div class="tab-pane" id="pic-1"><img src="<?php echo e(asset($product->img)); ?>" width="500" height="500"/></div>
                    </div>
                </div>
                <div class="details col-md">
                    <h3 class="product-title"><?php echo e($product->name); ?></h3>
                    <p class="product-description"><?php echo e($product->description); ?></p>
                    <h4 class="price">price: <span><?php echo e($product->price); ?></span></h4>
                    <h4 class="stock">stock: <span><?php echo e($product->stock); ?></span></h4>
                    <div class="action">
                        <button class="add-to-cart btn btn-success" type="button">Add to cart</button>
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/Home/productDetail.blade.php ENDPATH**/ ?>