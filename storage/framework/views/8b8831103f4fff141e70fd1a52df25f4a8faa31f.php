<?php $__env->startSection('content'); ?>
    <h2> Voici tous les scénarios disponibles : </h2>
    <table class="table table-striped">
        <thead>
        <tr class="info">
            <td>Nom du scénario</td>
            <td>Nombre d'étapes</td>
            <td>Points maximums</td>
            <td>Points obtenus</td>
            <td>Jouer</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach( $scenarios as $scenario): ?>
            <tr>
                <td><?php echo e($scenario->nom); ?></td>
                <td><?php echo e($scenario->nb_etape); ?></td>
                <td><?php echo e($scenario->pts_max); ?></td>
                <td>0</td>
                <td><a class="btn btn-primary" href="<?php echo e(route('scenario/', $scenario->id)); ?>">Suivre</a></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>