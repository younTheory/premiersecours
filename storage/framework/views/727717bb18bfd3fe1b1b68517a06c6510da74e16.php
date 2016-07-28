<?php $__env->startSection('content'); ?>
    <div class="bg-danger"> <?php echo e($etape->reponse_negative); ?></br>
    </div>
    <?php echo Form::open(['action' => array('ScenarioInviteController@score')]); ?>

    <div class="form-group">
        <?php echo Form::hidden('etapes_id', $etape->id); ?>

        <button class="btn btn-success">Score</button>
        <?php echo Form::close(); ?>

    <img src="<?php echo e(URL::to('/images_scenarios/'. $lien)); ?>"  width=100%/>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("defaultinvite", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>