<?php $__env->startSection('content'); ?>
    <h1>Editer</h1>
    <?php echo Form::open(['method' => 'put', 'url' => route('posts.update', $post)]); ?>


        <div class="form-group">
            <p>Titre:</p>
            <?php echo Form::text('titre', $post->titre, ['class' => 'form-control']); ?><br>

        </div>
        <div class="form-group">
            <p>description:</p>
            <?php echo Form::textarea('description', $post->description, ['class' => 'form-control']); ?>

        </div>
        <button class="btn btn-primary">Modifier</button>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>