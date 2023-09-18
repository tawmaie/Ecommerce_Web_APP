

<?php $__env->startSection('content'); ?>


<link rel="stylesheet" href="<?php echo e(asset('css/product3.css')); ?>">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md">
                    <div class="preview-pic">
                        <div class="tab-pane" id="pic-1"><img src="https://i.imgur.com/O0GMYuw.jpg" /></div>
                    </div>
                </div>
                <div class="details col-md">
                    <h3 class="product-title">Product Name</h3>
                    <p class="product-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius cum harum
                        sit suscipit aspernatur vitae, unde veritatis magnam deleniti illo, numquam id dolores dolorem quo
                        nulla, perspiciatis placeat saepe officiis.</p>
                    <h4 class="price">price: <span>10000 Bath</span></h4>
                    <h4 class="stock">stock: <span>10 Left</span></h4>
                    <div class="action">
                        <button class="add-to-cart btn btn-success" type="button">Add to cart</button>
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/HomeLayout/productdetail.blade.php ENDPATH**/ ?>