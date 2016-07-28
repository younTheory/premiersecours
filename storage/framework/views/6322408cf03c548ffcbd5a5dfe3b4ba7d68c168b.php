<?php $__env->startSection('content'); ?>
   <div class="bg-success"> <?php echo e($etape->reponse_positive); ?></div>
   <?php
      if ($id == 0) {
   ?>
   <?php echo Form::open(['action' => array('ScenarioInviteController@score')]); ?>

   <button class="btn btn-success">Score</button>
   <?php echo Form::close(); ?>

   <?php
      }
      else{
   ?>
   <?php echo Form::open(['action' => array('ScenarioInviteController@index')]); ?>

   <?php echo Form::hidden('etapes_id', $id); ?>

   <button class="btn btn-success">Suivre</button>
   <?php echo Form::close(); ?>

   <?php
      }
   ?>
   <img src="<?php echo e(URL::to('/images_scenarios/'. $lien)); ?>"  width=100%/>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("defaultinvite", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>