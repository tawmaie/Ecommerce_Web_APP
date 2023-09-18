<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customize</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="http://unpkg.com/grapesjs/dist/css/grapes.min.css">
    <script src="http://unpkg.com/grapesjs"></script>
    <script src="https://unpkg.com/grapesjs-blocks-basic"></script>
</head>

<body>
    <div class="panel__top">
        <div class="panel__basic-actions"></div>
        <div class="panel__devices"></div>
        <div class="panel__switcher"></div>
    </div>
    <div class="editor-row">
        <div class="editor-canvas">
            <div id="gjs"></div>
        </div>
        <div class="panel__right">
            <div class="blocks-container"></div>
            <div class="layers-container"></div>
            <div class="styles-container"></div>
        </div>
    </div>
    <form id="template-save-form" action="<?php echo e(route('StoreTemplate', [
        'shop' => $shop->getKey(),
    ])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="components" />
        <input type="hidden" name="html" />
        <input type="hidden" name="css" />
    </form>
            <link rel="stylesheet" href="<?php echo e(asset('customizer/customizer.css')); ?>">
            <script src="<?php echo e(asset('customizer/customizer.js')); ?>"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
            </script>

            <script>
                editor.loadProjectData(<?php echo empty($shop->shopTemplate?->components) ? '{}' : $shop->shopTemplate?->components; ?>);
            </script>
</body>
<?php /**PATH D:\xxamp\htdocs\project\resources\views/Home/Custom/CustomLayout1.blade.php ENDPATH**/ ?>