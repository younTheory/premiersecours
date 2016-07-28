<?php $__env->startSection('content'); ?>
    <h2> Voici tous les postes </h2>
    <table class="table table-striped">
        <thead>
            <tr class="info">
                <td>Id</td>
                <td>Titre</td>
                <td>Description</td>
                <td>Editer</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach( $posts as $post): ?>
            <tr>
                <td><?php echo e($post->id); ?></td>
                <td><?php echo e($post->titre); ?></td>
                <td><?php echo e($post->description); ?></td>
                <td><a class="btn btn-primary" href="<?php echo e(route('posts.edit', $post)); ?>">Editer</a></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>