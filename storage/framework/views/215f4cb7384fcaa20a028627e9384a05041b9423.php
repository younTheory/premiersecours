<?php $__env->startSection('content'); ?>
    <div class="bg-primary">
        <?php echo e($etape->text); ?>

    </div>

    <?php
        if ($etape->no_etape != $etape->scenario->nb_etape)
    {
            $id = $etape->etapeSuivante()->id;
        ?>

    </br>
    <?php echo Form::open(['action' => array('ScenarioController@index')]); ?>

    <?php echo Form::hidden('etapes_id', $id); ?>

    <button class="btn btn-success">Suivant</button>
    <?php echo Form::close(); ?>

    <img src="<?php echo e(URL::to('/images_scenarios/'. $lien)); ?>"  width=100%/>
    <?php
        }
        else{

                ?>
        <?php echo Form::open(['action' => array('ScenarioController@score')]); ?>

        <div class="form-group">
            <?php echo Form::hidden('etapes_id', $etape->id); ?>

            <button class="btn btn-success">Score</button>
            <?php echo Form::close(); ?>

        </div>
        <?php
            }
        ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>