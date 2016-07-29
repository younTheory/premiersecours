<?php $__env->startSection('content'); ?>
    <h2 > Vous avez bien créer l'utilisateur <?php echo e($nom); ?></h2>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>