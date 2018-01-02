<?php if(count($errors) > 0): ?>
    <div class="container col-md-8"
            style="
                  position: sticky;
                  z-index: 10;
                  float: left;
                  top: 60px;
                  left: 20px;
                  color: red;
                  "
    >
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="error"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(session('message')): ?>
    <div class="container col-md-8"
         style="
                  position: sticky;
                  z-index: 10;
                  float: left;
                  top: 60px;
                  left: 20px;
                  "
    >
    <div class="alert alert-success .col-md-5 .col-md-offset-3">
        <?php echo e(session('message')); ?>

    </div>
    </div>
<?php endif; ?>