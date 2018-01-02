<?php $__env->startSection('title'); ?>
    Todo: Reset Password
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container col-md-4">
        <form class="form-signin" method="post" action="/reset">
            <?php echo e(csrf_field()); ?>

            <h2 class="form-signin-heading">Please enter your email</h2>
            <input type="email" name="email" id="inputEmail" class="form-control inputForm" placeholder="Email address" required autofocus>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Reset</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>