<?php $__env->startSection('content'); ?>
    <h2> Vous êtes bien connecté au cours <?php echo e($nom); ?></h2>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("defaultinvite", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>