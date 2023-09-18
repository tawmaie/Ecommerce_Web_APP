<?php $__env->startSection('categories'); ?>
<div class="row">
        <div class="col-12 col-sm-3 mt-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"> Categories
                </div>
                <ul class="list-group category_block">
                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item"><a href="<?php echo e(route('listbytype',$type->id)); ?>"><?php echo e($type->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('promotion'); ?>
<div class="card mt-3">
    <div class="card-header bg-primary text-white text-uppercase"> Promotion </div>
    <div class="container-top">
        <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php $__currentLoopData = range(1, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item active">
                        <a href="<?php echo e(route('product')); ?>">
                            <img src="<?php echo e(asset('images/promotion-sm.jpg')); ?>" class="d-block" alt="...">
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('products'); ?>
    <div class="col">
        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-4 mt-3">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo e(asset($product->img)); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="#" title="View Product"><?php echo e($product->name); ?></a></h4>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"><?php echo e($product->price); ?> Bath</p>
                                </div>
                                <div class="col">
                                    <a href="<?php echo e(route('addtocart', $product->getKey())); ?>" class="btn btn-success btn-block">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-3">
                    <li class="nav-item">
                        <a class="nav-link active d-flex align-items-center text-white" aria-current="page"
                            href="#"><i class="fas fa-bars pe-2"></i>Menu</a>
                    </li>
                </ul>
                <form class="d-flex align-items-center w-100 form-search">
                    <input type="search" class="form-control" placeholder="Search" aria-label="Search" />
            </div>
            <a href="#" class="text-white"><i class="fas fa-search ps-3"></i></a>
            </form>

            <ul class="navbar-nav ms-3">
                <li class="nav-item" style="width: 65px;">
                    <a class="nav-link d-flex align-items-center text-white" href="#!">Cart</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <div class="container">
        <div class="row text-center">
            <img src="<?php echo e(asset('images/banner.jpg')); ?>" class="img-fluid center-block" alt="...">
        </div>
    </div>
<?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>
<style>.gjs-row{display:table;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;width:100%;}.gjs-cell{width:8%;display:table-cell;height:75px;}#im6t{width:30%;}#i234{width:70%;}@media(max-width: 768px){.gjs-cell{width:100%;display:block;}}</style>
<body id="i5aq"><div class="gjs-row" id="i23l"><div class="gjs-cell" id="im6t"><?php echo $__env->yieldContent('categories'); ?></div><div class="gjs-cell" id="i234"><?php echo $__env->yieldContent('products'); ?></div></div></body><?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\storage\framework\views/a9eb10c34d8dbf1a1d39d4cef11213d6e25f202c.blade.php ENDPATH**/ ?>