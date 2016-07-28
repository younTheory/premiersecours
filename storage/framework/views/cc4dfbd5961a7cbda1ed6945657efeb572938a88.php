<?php $__env->startSection('content'); ?>
    <h1>Éditer le cours </h1>
    <?php echo Form::open(['method' => 'put', 'url' => route('cours.update', $cour)]); ?>


    <div class="form-group">
        <p>Nom :</p>
        <?php echo Form::text('nom', $cour->nom, ['class' => 'form-control']); ?><br>
    </div>
    <div class="form-group">
        <p>Changer le mot de passe (laisser blanc si on ne veut pas changer de mot de passe) :</p>
        <?php echo Form::password('pass1', ['class' => 'form-control']); ?><br>
    </div>
    <div class="form-group">
        <p>Répéter le nouveau mot de passe :</p>
        <?php echo Form::password('pass2', ['class' => 'form-control']); ?><br>
    </div>
    <div class="form-group">
        <p>Email :</p>
        <?php echo Form::label('email', $cour->invite->email, ['class' => 'form-control']); ?><br>
    </div>

    <div class="form-group">
        <p>État :</p>
        <?php echo Form::select('etat_cours_id', $etat, $cour->etat->id,array('class'=>'form-control','style'=>'' )); ?><br>
    </div>
    <button class="btn btn-primary">Modifier</button>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>