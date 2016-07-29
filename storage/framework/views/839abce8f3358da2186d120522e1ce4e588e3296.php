<?php $__env->startSection('content'); ?>
    <h2> Statistiques de <?php echo e($nom); ?> </h2>
    <p>Points : <?php echo e($scoreObtenu); ?> / <?php echo e($scoreMax); ?></p>
    <?php /* on doit insérer les donnuts manuellement pas possible de donner les variables */ ?>
    <?php /* total*/ ?>
    <div id="ca_total"></div>
    <?php echo Lava::render('DonutChart', 'total', 'ca_total'); ?>
    <?php /* scénario 1*/ ?>
    <div id="scenario1"></div>
    <?php echo Lava::render('DonutChart', 'Scenario1', 'scenario1'); ?>
    <?php /*scénario 2*/ ?>
    <div id="scenario2"></div>
    <?php echo Lava::render('DonutChart', 'Scenario2', 'scenario2'); ?>







<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>