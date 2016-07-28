<?php $__env->startSection('content'); ?>
    <div class="bg-danger">
        Vous avez fait un total de <?php echo e($points); ?> points
    </div>
    <a class="btn btn-success" href="<?php echo e(route('scenarios')); ?>">Retour scénarios</a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>