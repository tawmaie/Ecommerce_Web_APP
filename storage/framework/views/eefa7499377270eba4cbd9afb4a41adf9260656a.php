

<?php $__env->startSection('content'); ?>
    <?php $total = 0; ?>
    <h1 class="text-center">Shopping Cart</h1>
    <table class="table table-bordered mt-5">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description
            <th width='120'>Quantity</th>
            <th>Price</th>
            <th width="100">Action</th>
        </tr>
        <?php if(session('cart') != null): ?>
            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><img src="<?php echo e(asset($product['img'])); ?>" style="width: 100px" alt=""></td>
                    <td><?php echo e($product['name']); ?></td>
                    <td><?php echo e($product['description']); ?></td>
                    <td>
                        <form action=" <?php echo e(route('updatecart')); ?> " method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($id); ?>" />
                            <input type="number" id="quantity" name="quantity" min="1"
                                max="<?php echo e($product['stock']); ?>" value="<?php echo e($product['quantity']); ?>">
                            <button type="submit" class="btn btn-info"><i class="bi bi-arrow-clockwise"></i></button>
                        </form>
                    </td>

                    <td><?php echo e($product['price']); ?></td>
                    <td>
                        <a href="<?php echo e(route('removefromcart', $id)); ?>"><button type="button" class="btn btn-danger"><i
                                    class="bi bi-trash"></i></button></a>
                    </td>
                </tr>
                <?php
                $total += $product['price'] * $product['quantity'];
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </table>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="<?php echo e(route('home')); ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
            </div>
            <div class="col text-end">
                <p class="h3"><strong>Total <?php echo e($total); ?> baht</strong></p>
                <?php if(Auth::user()): ?>
                    <div class="d-flex flex-row-reverse"><a href="<?php echo e(route('checkout')); ?>"><button type="button"
                                class="btn btn-success">Checkout</button></a></a></div>
                <?php else: ?>
                    <div class="d-flex flex-row-reverse"><a href="<?php echo e(route('login')); ?>"><button type="button"
                                class="btn btn-success">To checkout please login</button></a></a></div>
                <?php endif; ?>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/Home/Cart.blade.php ENDPATH**/ ?>