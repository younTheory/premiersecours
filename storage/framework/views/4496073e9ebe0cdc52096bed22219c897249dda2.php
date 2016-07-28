<?php $__env->startSection('content'); ?>
    <div class="bg-primary">
        <?php echo e($etape->text); ?>

        <?php echo Form::open(['action' => 'ScenarioInviteController@store', 'id' => 'redirect']); ?>

        <?php echo Form::hidden('etapes_id', $etape->id); ?>

        <div class="form-group">
            <?php foreach($reponses as $reponse): ?>

                <input type="checkbox" name="rep[]" value="<?php echo e($reponse->id); ?>"  ><?php echo e($reponse->reponse); ?></br>
            <?php endforeach; ?>
        </div>
    </div>
    <button class="btn btn-success">Suivant</button>
    <?php echo Form::close(); ?>

    <div id="dvCountDown" style="display: none">
        Vous avez encore <span id="lblCount"></span>&nbsp;secondes.
    </div>
    <script>
        window.onload=function(){
            var secondes = <?php echo $etape->temps ?>;
            $("#dvCountDown").show();
            $("#lblCount").html(secondes);
            setInterval(function () {
                secondes--;
                $("#lblCount").html(secondes);
                if (secondes == 0) {
                    $("#dvCountDown").hide();
                    window.document.getElementById("redirect").submit();
                }
            }, 1000);

        };
    </script>


    <img src="<?php echo e(URL::to('/images_scenarios/'. $lien)); ?>"  width=100%/>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("defaultinvite", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>