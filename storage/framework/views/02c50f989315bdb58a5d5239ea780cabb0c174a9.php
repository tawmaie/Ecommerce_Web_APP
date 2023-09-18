

<?php $__env->startSection('content'); ?>
    <div class="col-md-12 text-center">
        <h1>Shop List</h1>
    </div>
    <?php if($message = Session::get('error')): ?>
        <div class="alert alert-warning">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
    <div class="card my-4">
        <div class="card-header">
            Edit Shop
        </div>
        <div class="card-body">
            <form action=" <?php echo e(route('shops.update', $shop->id)); ?> " method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Shop Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="<?php echo e(old('name', $shop['name'])); ?>">
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="type" class="form-label">Shop Owner</label>
                        <select class="form-select" aria-label="Default select example" id="user_id" name="user_id">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->getKey()); ?>" <?php if(old('user_id', $shop->user?->getKey()) == $user->getKey()): echo 'selected'; endif; ?>><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo e(route('shops.index')); ?>" class="btn btn-danger">Cancle</a>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/shop/edit.blade.php ENDPATH**/ ?>