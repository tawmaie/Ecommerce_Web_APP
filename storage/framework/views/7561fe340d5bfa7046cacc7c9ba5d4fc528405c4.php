

<?php $__env->startSection('content'); ?>
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="invoice p-5">
                        <h5>Your order Confirmed!</h5>
                        <span class="font-weight-bold d-block mt-4">Hello, <?php echo e($order->Fname); ?></span>
                        <span>You order has been confirmed and will be shipped in next two days!</span>
                        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                            <table class="table table-borderless">
                                <h3>Shipping Address</h3>
                                <p><?php echo e($order->Fname . ' ' . $order->Lname . '<br/>' . $order->address); ?></p>
                            </table>
                        </div>
                        <div class="product border-bottom table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td width="20%">
                                                <img src="<?php echo e(asset($cart['img'])); ?>" width="90">
                                            </td>
                                            <td width="60%">
                                                <span class="font-weight-bold"><?php echo e($cart['name']); ?></span>
                                                <div class="product-qty">
                                                    <span class="d-block"><?php echo e($cart['quantity']); ?></span>
                                                </div>
                                            </td>
                                            <td width="20%">
                                                <div class="text-right">
                                                    <span class="font-weight-bold"><?php echo e($cart['price']); ?>Bath</span>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-5">
                                <table class="table table-borderless">
                                    <tr class="border-top border-bottom">
                                        <td>
                                            <div class="text-left">
                                                <span class="font-weight-bold">Subtotal</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-right">
                                                <span class="font-weight-bold"><?php echo e($order->total); ?></span>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
                        <p class="font-weight-bold mb-0">Thanks for shopping with us!</p>
                        <span>Nike Team</span>
                    </div>
                    <div class="d-flex justify-content-between footer p-3">
                        <span>Need Help? visit our <a href="#"> help center</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/Order/Billing.blade.php ENDPATH**/ ?>