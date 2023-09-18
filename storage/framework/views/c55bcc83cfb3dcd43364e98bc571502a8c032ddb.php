<div class="col-<?php echo e($card['colspan']); ?> mt-3">
    <?php if($card['component'] === 'container'): ?>
        <?php $__currentLoopData = $card['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <?php if (isset($component)) { $__componentOriginal4a6d92dfcb825b85662a76b921053b0c2b31e61d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Shop\Card::class, ['card' => $child] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('shop.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Shop\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a6d92dfcb825b85662a76b921053b0c2b31e61d)): ?>
<?php $component = $__componentOriginal4a6d92dfcb825b85662a76b921053b0c2b31e61d; ?>
<?php unset($__componentOriginal4a6d92dfcb825b85662a76b921053b0c2b31e61d); ?>
<?php endif; ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <?php echo $__env->yieldContent($card['component']); ?>
    <?php endif; ?>
</div>
<?php /**PATH D:\xxamp\htdocs\project\resources\views/components/shop/card.blade.php ENDPATH**/ ?>