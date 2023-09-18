

<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <div class="mt-4 p-5 bg-primary text-white rounded">
      <h1>Customize Your Own Shop</h1> 
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p> 
    </div>
    <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
    <?php endif; ?>
  </div>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card mt-5" style="border-radius: 10px; ">
                        <img class="card-img-top" src="<?php echo e(asset($shop->logo)); ?>" alt="Card image cap"
                            style="border-radius: 50%">
                        <div class="card-body text-center">
                            <h4 class="card-body"><a href="<?php echo e(route('showHome',$shop->getKey())); ?>" title="View Product"><?php echo e($shop->name); ?></a></h4>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <form action=" <?php echo e(route('CustomLayout')); ?> " method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($shop->id); ?>"/>
                                    <button type="submit" class="btn btn-sm btn-outline-secondar">Edit</button></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.owner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/Home/Custom/index.blade.php ENDPATH**/ ?>