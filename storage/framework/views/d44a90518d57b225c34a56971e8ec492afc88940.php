<?php $__env->startSection('content'); ?>
    <h2> Mon profil </h2>
    <table class="table table-striped">
        <thead>
        <tr class="info">
            <td>Nom</td>
            <td>Email</td>
            <td>Mon score</td>
            <td>Date de création</td>
            <td>Éditer</td>
            <td>Statistiques</td>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($scoreObtenu); ?>/ <?php echo e($scoreMax); ?></td>
                <td><?php echo e($user->created_at); ?></td>
                <td><a class="btn btn-primary" href="<?php echo e(route('profil.edit')); ?>">Éditer</a></td>
                <td><a class="btn btn-primary" href="<?php echo e(route('scoreStat', $user->id)); ?>">Mes statistiques</a></td>
            </tr>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>