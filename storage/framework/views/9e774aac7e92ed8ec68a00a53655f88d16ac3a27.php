<?php $__env->startSection('content'); ?>
    <div class="bg-primary">
        <?php echo e($etape->text); ?>

        <?php echo Form::open(['action' => array('ScenarioInviteController@store')]); ?>

        <?php echo Form::hidden('etapes_id', $etape->id); ?>

        <div class="form-group">
            <?php
            $nb = count($reponses);
                $width = 95/$nb;
                $width = $width . '%';
            ?>
        </div>
    </div>

            <?php foreach($reponses as $reponse): ?>

                <input type="radio" name="rep" value="<?php echo e($reponse->id); ?>"  ><img src="<?php echo e(URL::to('/images_scenarios/'. $reponse->reponse)); ?>"  width=<?php echo e($width); ?>/>
            <?php endforeach; ?>


    <button class="btn btn-success">Suivant</button>
    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("defaultinvite", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>