<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basic E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard/dashboard.css')); ?>" />

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Basic E-Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="<?php echo e(route('home')); ?>">Home</a>
                    <?php if(auth()->guard()->check()): ?>
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
                    <?php endif; ?>


                    <?php echo $__env->yieldContent('header'); ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collpase">
                <div class="position-sticky">
                    <div class="nav flex-column">
                        <li class="nav-item">
                            <a href="<?php echo e(route('OwnerHome')); ?>" class="nav-link active" aria-current="page">
                                <i class="bi bi-house-door"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('custom')); ?>" class="nav-link" aria-current="page">
                                <i class="bi bi-gear"></i>
                                <span>Customize</span></a>
                        </li>                        
                        <li class="nav-item">
                            <a href="<?php echo e(route('ShopSetting')); ?>" class="nav-link" aria-current="page">
                                <i class="bi bi-shop"></i>
                                <span>Shop</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('OwnerShop')); ?>" class="nav-link" aria-current="page">
                                <i class="bi bi-box"></i>
                                <span>Product</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('stock')); ?>" class="nav-link" aria-current="page">
                                <i class="bi bi-archive"></i>
                                <span>Stock</span></a>
                        </li>

                    </div>
                </div>
            </nav>

            <main class="col-md-8 col-lg-10">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH D:\xxamp\htdocs\project\resources\views/layouts/owner.blade.php ENDPATH**/ ?>