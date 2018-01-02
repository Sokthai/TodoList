<?php $__env->startSection('content'); ?>
    <div class="container col-md-5">
        <form method="post" action="/register" class="form-signin">
            <?php echo e(csrf_field()); ?>

            <h1 class="form-signin-heading">Registration</h1>
            <input name="name" class="form-control inputForm" id="name" placeholder="Name" required autofocus>
            <input type="email" name="email" id="email" class="form-control inputForm" placeholder="Email Address" required>
            <input type="password" name="password" class="form-control inputForm" id="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control inputForm" placeholder="Confirm Password" required>

            <?php echo $__env->make('master.resetQuestions', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <button name="submit" class="btn btn-primary btn-block">Register</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>