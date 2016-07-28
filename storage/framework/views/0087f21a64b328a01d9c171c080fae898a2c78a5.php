<?php $__env->startSection('content'); ?>
    <div class="bg-primary">
        <?php echo e($etape->text); ?>

        <?php
        if ($etape->points > 0)
        {

        ?>
        <?php echo Form::open(['action' => array('ScenarioController@index', $etape->id)]); ?>

        <div class="form-group">
            <?php foreach($reponses as $reponse): ?>

                <input type="radio" name="rep" value="<?php echo e($reponse->id); ?>"  ><?php echo e($reponse->reponse); ?></br>
            <?php endforeach; ?>
        </div>
    </div>
    <button class="btn btn-success">Suivant</button>
    <?php echo Form::close(); ?>

    <?php
    }
    else
    {

        $id = $etape->etapeSuivante()->id;
        ?>
    </div>
    </br>
        <a class="btn btn-primary" href="<?php echo e(route('scenario', $id)); ?>">Suivant</a></br>
    <?php
    }
    ?>

    <img src="<?php echo e(URL::to('/images_scenarios/'. $etape->lien_img)); ?>"  width=100%/>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>