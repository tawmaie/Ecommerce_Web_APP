

<?php $__env->startSection('content'); ?>
    <div class="col-md-12 text-center">
        <h1>Shop List</h1>
    </div>
    <?php if($message = Session::get('error')): ?>
        
        <script>
            var message = '<?= $var ?>'
            alert(message)
        </script>
    <?php endif; ?>
    <div class="card my-4">
        <div class="card-header">
            Create Shop
        </div>
        <div class="card-body">
            <form action=" <?php echo e(route('shops.store')); ?> " method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Shop Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Shop Owner</label>
                    <select class="form-select" aria-label="Default select example" id="user_id" name="user_id">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>" <?php if(old('user_id') == $user->id): echo 'selected'; endif; ?>><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo e(route('shops.index')); ?>" class="btn btn-danger">Cancle</a>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/shop/create.blade.php ENDPATH**/ ?>