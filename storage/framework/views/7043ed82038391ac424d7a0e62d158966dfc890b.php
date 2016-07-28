<?php $__env->startSection('content'); ?>
    <h2> Voici tous les scénarios disponibles </h2>
    <table class="table table-striped">
        <thead>
        <tr class="info">
            <td>Nom du scénario</td>
            <td>Nombre d'étapes</td>
            <td>Points maximums</td>
            <td>Jouer</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach( $scenarios as $index => $scenario): ?>
            <tr>
                <td><?php echo e($scenario->nom); ?></td>
                <td><?php echo e($scenario->nb_etape); ?></td>
                <td><?php echo e($scenario->pts_max); ?></td>
                <?php echo Form::open(['action' => array('ScenarioInviteController@index')]); ?>

                <?php echo Form::hidden('etapes_id', $etapes[$index][0]->id); ?>

                <td><button class="btn btn-success">Suivre</button></td>
                <?php echo Form::close(); ?>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("defaultinvite", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>