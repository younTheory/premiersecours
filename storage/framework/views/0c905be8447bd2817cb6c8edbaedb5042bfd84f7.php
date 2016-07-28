<?php $__env->startSection('content'); ?>
    <h2> Voici tous les scénarios concernant le cours <?php echo e($nom); ?> : </h2>
    <table class="table table-striped">
        <thead>
        <tr class="info">
            <td>Nom du scénario</td>
            <td>Nombre d'étapes</td>
            <td>Cours</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach( $scenariosCours as $index => $scenario): ?>
            <tr>
                <td><?php echo e($scenario->nom); ?></td>
                <td><?php echo e($scenario->nb_etape); ?></td>
                <?php echo Form::open(['action' => array('CoursController@storeAcces', $id)]); ?>

                <?php
                if($scenario->pivot->active == 0)
                    {
                        ?>
                <?php echo Form::hidden('active', 1); ?>

                <td><button class="btn btn-success">Ajouter scénario au cours</button></td>
                <?php
                    }
                else{

                ?>
                <?php echo Form::hidden('active', 0); ?>

                <td><button class="btn btn-danger">Enlever scénario du cours</button></td>
                <?php } ?>
                <?php echo Form::hidden('scenario_id', $scenario->id); ?>

                <?php echo Form::hidden('cours_id', $id); ?>

                <?php echo Form::close(); ?>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>