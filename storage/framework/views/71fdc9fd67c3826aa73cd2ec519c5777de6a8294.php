<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
</head>
<body>
    <div class="container">
        <div class="col-md-12 text-center">
            <h1>Product List</h1>
        </div>
        <div class="card my-4">
            <div class="card-header">
                Edit Product
            </div>
            <div class="card-body">
                <form action=" <?php echo e(route('product.update'), $product->id); ?> " method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" value=" <?php echo e($product->name); ?> ">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" value=" <?php echo e($product->description); ?> "></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type" value=" <?php echo e($product->type); ?> ">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="Stock" name="Stock" value=" <?php echo e($product->Stock); ?> ">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="Price" name="Price" value=" <?php echo e($product->Price); ?> ">
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="<?php echo e(route('product.index')); ?>" class="btn btn-danger">Cancle</a>
                </form>
            </div>
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html><?php /**PATH D:\xxamp\htdocs\project\resources\views/product/update.blade.php ENDPATH**/ ?>