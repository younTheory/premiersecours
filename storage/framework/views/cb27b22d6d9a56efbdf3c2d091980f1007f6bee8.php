<?php $__env->startSection('content'); ?>
    <h1>Créer un compte</h1>
    <?php echo Form::open(['method' => 'post', 'url' => route('user.store')]); ?>

    <?php echo e($erreur); ?>

    <div class="form-group">
        <p>Nom :</p>
        <?php echo Form::text('nom', "", ['class' => 'form-control']); ?><br>
    </div>
    <div class="form-group">
        <p>Changer le mot de passe :</p>
        <?php echo Form::password('pass1', ['class' => 'form-control']); ?><br>
    </div>
    <div class="form-group">
        <p>Répéter mot de passe :</p>
        <?php echo Form::password('pass2', ['class' => 'form-control']); ?><br>
    </div>
    <div class="form-group">
        <p>Email :</p>
        <?php echo Form::email('email', "", ['class' => 'form-control']); ?><br>
    </div>
    <div class="form-group">
        <p>Actif :</p>
        <?php echo Form::select('active', array('0' => 'Non', '1' => 'Oui' ),0, array('class'=>'form-control','style'=>'' )); ?><br>

    </div>

    <div class="form-group">
        <p>Rôle :</p>
        <?php echo Form::select('role_id', $roles, 3,array('class'=>'form-control','style'=>'' )); ?><br>
    </div>
    <button class="btn btn-primary">Créer le compte</button>
    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>