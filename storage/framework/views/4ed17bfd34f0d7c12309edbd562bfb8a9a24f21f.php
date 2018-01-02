<?php $__env->startSection('title'); ?>
    Todo: <?php echo e(title_case($todo->name)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <h1 class="todoTitle"><?php echo e(title_case($todo->name)); ?></h1>

    <div class="form-group">
        <p class="statue">Type : <?php echo e(ucfirst($todo->type)); ?></p>
        <p class="status">Closing : <span class="<?php echo e($todo->closing? "statusComplete" : "statusInComplete"); ?>"><?php echo e($todo->closing? "Closed" : "Open"); ?></span></p>
        <p class="status">Complete : <span class="<?php echo e($todo->complete? "statusComplete" : "statusInComplete"); ?>"><?php echo e($todo->complete? "Completed" : "Incomplete"); ?></span></p>
        <p class="statue">Created on : <?php echo e($todo->created_at); ?></p>
        <p class="statue">Path : <?php echo e($todo->path); ?></p>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="alert-success">
        <tr >
            <td width="2%">No</td>
            <td width="45%">Description</td>
            <td width="32%">Comment</td>
            <td width="10%">Time</td>
            <td width="11%">Date</td>
        </tr>
        </thead>

        <?php $__currentLoopData = $todo->description; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $desc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <?php if(strlen($desc->description) > 50): ?>
                    <td><textarea style="background-color: transparent" readonly class="form-control long-text">
                        <?php echo e(ucfirst($desc->description)); ?>

                    </textarea></td>
                <?php else: ?>
                    <td><?php echo e(ucfirst($desc->description)); ?></td>
                <?php endif; ?>

                <?php if(strlen($desc->comment) > 50): ?>
                    <td><textarea style="background-color: transparent" readonly class="form-control long-text">
                        <?php echo e(ucfirst($desc->comment)); ?>

                    </textarea></td>
                <?php else: ?>
                    <td><?php echo e(ucfirst($desc->comment)); ?></td>
                <?php endif; ?>
                <td><?php echo e($desc->created_at->toTimeString()); ?></td>
                <td><?php echo e($desc->created_at->toFormattedDateString()); ?></td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <?php echo $__env->make('master.progress', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>