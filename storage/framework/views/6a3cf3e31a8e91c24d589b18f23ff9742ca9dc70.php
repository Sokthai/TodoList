<?php $__env->startSection('title'); ?>
    Todo: myTodoList -- Login
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container col-md-5">
        <form class="form-signin" method="post" action="/reset/changePassword">
            <?php echo e(csrf_field()); ?>

            <h2 class="form-signin-heading" style="margin-top: 3em">Reset password</h2>
            <input name="token" type="hidden" value="<?php echo e($token); ?>">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" style="margin-bottom: 1em" placeholder="new password" required autofocus>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="password_confirmation" id="confirmation_password" class="form-control" style="margin-bottom: 1em" placeholder="confirm password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Change password</button>

        </form>

    </div> <!-- /container -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>