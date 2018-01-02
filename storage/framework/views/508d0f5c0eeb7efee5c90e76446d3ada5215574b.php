<?php $__env->startSection('title'); ?>
    Todo: myTodoList -- Login
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


        <form class="form-signin" method="get" action="/reset/verify">
            <?php echo e(csrf_field()); ?>

            <div class="form-group col-md-5 container">
                <input type="hidden" name="token" value="<?php echo e($token->token); ?>">
                <h1 class="form-signin-heading" style="margin-top: 2.5em">Security Questions:</h1>
                    <p>Email: <?php echo e($token->email); ?></p>
                <br/>
                <label for="firstAnswer"><?php echo e($token->firstQuestion); ?></label>
                <input type="text" name="firstAnswer" id="firstAnswer" class="form-control" style="margin-bottom: 1em" placeholder="Security Answer" required autofocus>

                <label for="secondAnswer"><?php echo e($token->secondQuestion); ?></label>
                <input type="text" name="secondAnswer" id="secondAnswer" class="form-control" style="margin-bottom: 1em" placeholder="Security Answer" required>

                <label for="thirdAnswer"><?php echo e($token->thirdQuestion); ?></label>
                <input type="text" name="thirdAnswer" id="thirdAnswer" class="form-control" style="margin-bottom: 1em" placeholder="Security Answer" required>

                <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 1em">Submit</button>
            </div>
        </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>