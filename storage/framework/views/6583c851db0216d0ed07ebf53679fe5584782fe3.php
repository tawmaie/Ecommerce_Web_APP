

<?php $__env->startSection('content'); ?>
    <div class="col-md-12 text-center">
        <h1>Product List</h1>
    </div>
    <?php if($message = Session::get('error')): ?>
    <div class="alert alert-warning">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card my-4">
        <div class="card-header">
            Edit Product
        </div>
        <div class="card-body">
            <form action=" <?php echo e(route('shops.product.update', [
                ...((array) Route::current()->parameters()),
            ])); ?> " method="post"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="<?php echo e(old('name', $product['name'])); ?>">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5"><?php echo e(old('description', $product['description'])); ?></textarea>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" aria-label="Default select example" id="type_id" name="type_id">
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type->getKey()); ?>" <?php if(old('type_id', $product->type?->getKey()) == $type->getKey()): echo 'selected'; endif; ?>><?php echo e($type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock"
                        value="<?php echo e(old('stock', $product['stock'])); ?>">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" step="0.01" id="price" name="price"
                        value="<?php echo e(old('price', $product['price'])); ?>">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Your product picture</label>
                    <input class="form-control" type="file" id="img" name="img" value="<?php echo e(old('img', $product['img'])); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo e(route('shops.product.index', [
                    ...((array) Route::current()->parameters()),
                ])); ?>" class="btn btn-danger">Cancle</a>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/product/edit.blade.php ENDPATH**/ ?>