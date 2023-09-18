<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body>
    <div class="container mt-2">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>Product List</h1>
        </div>
        <div class="container-md">
          <a href="#" class="btn btn-success">Add Product</a>
          <table class="table">
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Description</th>
              <th>Type</th>
              <th>Stock</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($product->id); ?></td>
                  <td><?php echo e($product->name); ?></td>
                  <td><?php echo e($product->description); ?></td>
                  <td><?php echo e($product->type); ?></td>
                  <td><?php echo e($product->stock); ?></td>
                  <td><?php echo e($product->price); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
        </div>
      </div>
    </div>
</body>
</html><?php /**PATH D:\xxamp\htdocs\project\resources\views/product/product.blade.php ENDPATH**/ ?>