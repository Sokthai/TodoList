<?php $__env->startSection('title'); ?>
    Todo: myTodoList -- Delete
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div>
    <br/>
    <br/>
    <h2 class="blog-header" style="margin-top: 1em;">
        Selected Record: <?php echo e($count); ?> <br/>
        <br/></h2>
    <div class="container form-group">
        <form method="post" action="/destroy/<?php echo e($strId); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('delete')); ?>


            <div class="row">
                <div class="col-sm-8 blog-main">
                    <div class="blog-post" style="margin-bottom: 4rem">
                        <?php $__currentLoopData = $deleteRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deleteRecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h3 class="blog-post-title" style="margin-bottom: .25rem; color: #800000"><?php echo e(title_case($deleteRecord->name)); ?></h3>
                            <h6 style="margin-bottom: 1.25rem; color: #999; size: 10px"><?php echo e(ucfirst($deleteRecord->type)); ?> <?php echo e($deleteRecord->created_at); ?></h6>
                            <h5><?php echo e(ucfirst($deleteRecord->description->first()->description)); ?></h5>
                            <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <a href="/" class="btn btn-default">Cancel</a>
            <button class="btn btn-danger">Confirm</button>
        </form>
    </div>


    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>