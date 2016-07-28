<?php $__env->startSection('content'); ?>
    <h2> Voici tous vos cours : </h2>
    <td><a class="btn btn-primary" href="<?php echo e(route('cours.create')); ?>">Créer un nouveau cours</a></td>
    <table class="table table-striped">
        <thead>
            <tr class="info">
                <td>Nom</td>
                <td>Date de création</td>
                <td>Email</td>
                <td>État</td>
                <td>Statistiques du cours</td>
                <td>Éditer le cours</td>
                <td>Accès du cours aux scénarios</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach( $cours as $cour): ?>
            <tr>
                <td><?php echo e($cour->nom); ?></td>
                <td><?php echo e($cour->created_at); ?></td>
                <td><?php echo e($cour->invite->email); ?></td>
                <td> <?php echo e($cour->etat->nom); ?> </td>
                <td><a class="btn btn-primary" href="<?php echo e(route('cours.statistique', $cour)); ?>">Voir statistiques</a></td>
                <td><a class="btn btn-primary" href="<?php echo e(route('cours.edit', $cour)); ?>">Éditer</a></td>
                <td><a class="btn btn-primary" href="<?php echo e(route('cours.acces.edit', $cour)); ?>">Éditer</a></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>