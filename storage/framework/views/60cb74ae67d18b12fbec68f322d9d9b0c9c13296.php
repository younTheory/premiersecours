<?php $__env->startSection('content'); ?>
    <h2> Voici tous les scores de tous les utilisateurs </h2>
    <table class="table table-striped">
        <thead>
        <tr class="info">
            <td>Nom</td>
            <td>Points</td>
            <td>Statistiques</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach( $users as $index => $user): ?>
            <tr>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->getScore()); ?> /<?php echo e($scoreMax); ?> </td>
                <td><a class="btn btn-primary" href="<?php echo e(route('scoreStat', $user->id)); ?>">Statistiques</a></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>








<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>