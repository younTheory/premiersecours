<?php $__env->startSection('content'); ?>
    <?php /* on doit insérer les donnuts manuellement pas possible de donner les variables */ ?>
    <?php /* total*/ ?>
    <div id="scenario1"></div>
    <?php echo Lava::render('ColumnChart', 'Scenario1', 'scenario1'); ?>
    <?php /*scénario 2*/ ?>
    <div id="scenario2"></div>
    <?php echo Lava::render('ColumnChart', 'Scenario2', 'scenario2'); ?>








<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>