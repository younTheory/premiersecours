<?php $__env->startSection('content'); ?>
    <div class="bg-primary">
        <?php echo e($etape->text); ?></br>
        <div id="dvCountDown" style="display: none">
            Vous avez encore <span id="lblCount"></span>&nbsp;secondes.
        </div>
        <?php echo Form::open(['action' => 'ScenarioController@store', 'id' => 'redirect']); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make("default", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>