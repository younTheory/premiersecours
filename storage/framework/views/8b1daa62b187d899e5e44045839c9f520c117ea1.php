<?php $__env->startSection('content'); ?>
    <h1>Éditer l'utilisateur </h1>
    <?php echo Form::open(['method' => 'put', 'url' => route('user.update', $user)]); ?>


        <div class="form-group">
            <p>Nom :</p>
            <?php echo Form::text('name', $user->name, ['class' => 'form-control']); ?><br>

        </div>
        <div class="form-group">
            <p>Email :</p>
            <?php echo Form::text('email', $user->email, ['class' => 'form-control']); ?><br>

        </div>
        <div class="form-group">
            <p>Actif :</p>
            <?php echo Form::select('active', array('0' => 'Non', '1' => 'Oui' ),$user->active, array('class'=>'form-control','style'=>'' )); ?><br>

        </div>

        <div class="form-group">
            <p>Rôle :</p>
            <?php echo Form::select('role_id', $roles, $user->role->id,array('class'=>'form-control','style'=>'' )); ?><br>
        </div>
        <button class="btn btn-primary">Modifier</button>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>