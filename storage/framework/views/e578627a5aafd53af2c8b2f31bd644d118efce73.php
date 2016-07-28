<?php $__env->startSection('content'); ?>
    <div class="bg-primary">
        <h2>Vous êtes bien connecté au cours <?php echo e($cours->nom); ?></h2>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("defaultinvite", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>