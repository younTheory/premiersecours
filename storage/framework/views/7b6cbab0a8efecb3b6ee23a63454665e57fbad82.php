<?php $__env->startSection('content'); ?>
    <h1>Créer un cours </h1>
    <?php echo e($erreur); ?>

    <?php echo Form::open(['method' => 'post', 'url' => route('cours.store')]); ?>


    <div class="form-group">
        <p>Nom du cours :</p>
        <?php echo Form::text('nom', '',['class' => 'form-control']); ?><br>

    </div>

    <div class="form-group">
        <p>Mot de passe pour se connecter au cours :</p>
        <?php echo Form::password('pass1', ['class' => 'form-control']); ?><br>

    </div>

    <div class="form-group">
        <p>Répéter le mot de passe :</p>
        <?php echo Form::password('pass2', ['class' => 'form-control']); ?><br>

    </div>


    <button class="btn btn-primary">Créer le cours</button>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>