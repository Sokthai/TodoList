<?php $__env->startSection('title'); ?>
    Todo: myTodoList -- Login
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container col-md-5">

        <form class="form-signin" method="post" action="/login">
            <?php echo e(csrf_field()); ?>

            <h2 class="form-signin-heading">Sign in</h2>
            <input type="email" name="email" id="inputEmail" class="form-control inputForm" placeholder="Email address" required autofocus>
            <input type="password" name="password" id="inputPassword" class="form-control inputForm" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <a href="/reset" class="btn btn-lg btn-primary btn-block">Forget password</a>
        </form>

    </div> <!-- /container -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>