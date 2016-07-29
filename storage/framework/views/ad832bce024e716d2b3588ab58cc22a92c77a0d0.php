<?php $__env->startSection('content'); ?>
    <h2> Voici tous les utilisateurs </h2>
    <td><a class="btn btn-primary" href="<?php echo e(route('user.create')); ?>">Créer un nouvel utilisateur</a></td>
    <table class="table table-striped">
        <thead>
            <tr class="info">
                <td>Nom</td>
                <td>Email</td>
                <td>Actif</td>
                <td>Rôle</td>
                <td>Éditer</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach( $users as $user): ?>
            <tr>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->active); ?></td>
                <td><?php echo e($user->role->role); ?></td>
                <td><a class="btn btn-primary" href="<?php echo e(route('user.edit', $user)); ?>">Éditer</a></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>