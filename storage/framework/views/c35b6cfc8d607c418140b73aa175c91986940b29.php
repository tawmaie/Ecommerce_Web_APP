<?php $__env->startSection('categories'); ?>
    <div class="card bg-light mb-3">
        <div class="card-header bg-primary text-white text-uppercase"> Categories
        </div>
        <ul class="list-group category_block">
            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item"><a href="<?php echo e(route('listbytype',$type->id)); ?>"><?php echo e($type->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('categories2'); ?>
    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 mt-1">
        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <a href="<?php echo e(route('listbytype', $type->id)); ?>"><div class="p-3 border bg-light" style="border-radius: 20px" ><?php echo e($type->name); ?></div></a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <h4 class="card-title"><a href="<?php echo e(route('productDetail',$product->id)); ?>" title="View Product"><?php echo e($product->name); ?></a></h4>
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
                <a class="nav-link d-flex align-items-center text-white" href="<?php echo e(route('cart')); ?>"><i class="bi bi-cart3"></i> Cart</a>
            </li>
        </ul>
        </div>
        </div>
    </nav>
<?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>
<style>.gjs-cell { vertical-align: top; }.gjs-row{display:table;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;width:100%;}.gjs-cell{width:8%;display:table-cell;height:75px;}#ijnf{padding:10px;text-align:right;font-family:Comic Sans MS, cursive, sans-serif;font-size:25px;text-shadow:4px 2px 3px black;}#ihco{width:172px;height:172px;}@media(max-width: 768px){.gjs-cell{width:100%;display:block;}}</style>
<body id="in7a"><div id="i134" class="gjs-row"><div class="gjs-cell"><div id="ijnf">Welcome to our book store</div></div><div class="gjs-cell"><img src="data:image/png;base64,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0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAAQdAAADEHQAAAxA0AEAMABBBwDAAP8Pz66UfYtV0ScAAAAASUVORK5CYII=" id="ihco"/></div></div><div class="gjs-row" id="i3i6"><div class="gjs-cell"><?php echo $__env->yieldContent('categories2'); ?></div></div><div class="gjs-row" id="i1znk"><div class="gjs-cell"><?php echo $__env->yieldContent('products'); ?></div></div></body><?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\storage\framework\views/b9b024c57ddd3ade6de30c92fd35bc4c4e445854.blade.php ENDPATH**/ ?>