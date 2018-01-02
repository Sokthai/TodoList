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
            <td width="30%">Comment</td>
            <td width="11%">Time</td>
            <td width="12%">Date</td>
        </tr>
        </thead>

        <?php $__currentLoopData = $todo->description()->orderBy('created_at', 'desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $desc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <div class="clearfix">
                    <?php if(strlen($desc->description) > 50): ?>
                        <td><textarea style="background-color: transparent" readonly class="form-control"><?php echo e(ucfirst($desc->description)); ?></textarea></td>
                    <?php else: ?>
                        <td>
                            <?php echo e(ucfirst($desc->description)); ?>


                            <?php if($desc->image->count() > 0): ?>
                                <a href="/pictures/<?php echo e($desc->image->first()->desc_id); ?>">&#9752;</a>
                            <?php endif; ?>

                        </td>
                    <?php endif; ?>
                </div>

                <?php if(strlen($desc->comment) > 50): ?>
                    <td><textarea style="background-color: transparent" readonly class="form-control long-text"><?php echo e(ucfirst($desc->comment)); ?></textarea></td>
                <?php else: ?>
                    <td><?php echo e(ucfirst($desc->comment)); ?></td>
                <?php endif; ?>
                <td>

                    <?php if($desc->created_at->hour > 12): ?>
                        <?php if(strlen($desc->created_at->hour % 12) == 1): ?>
                            0<?php echo e($desc->created_at->hour % 12); ?>

                        <?php else: ?>
                            <?php echo e($desc->created_at->hour % 12); ?>

                        <?php endif; ?>
                        :
                        <?php if($desc->created_at->minute < 10): ?>
                                 0<?php echo e($desc->created_at->minute); ?> PM
                        <?php else: ?>
                                <?php echo e($desc->created_at->minute); ?> PM
                        <?php endif; ?>

                    <?php elseif($desc->created_at->hour == 12): ?>
                        12
                        :
                        <?php if($desc->created_at->minute < 10): ?>
                            0<?php echo e($desc->created_at->minute); ?> PM
                        <?php else: ?>
                            <?php echo e($desc->created_at->minute); ?> PM
                        <?php endif; ?>
                    <?php elseif($desc->created_at->hour == 0): ?>
                        12 :
                        :
                        <?php if($desc->created_at->minute < 10): ?>
                            0<?php echo e($desc->created_at->minute); ?> AM
                        <?php else: ?>
                            <?php echo e($desc->created_at->minute); ?> AM
                        <?php endif; ?>
                    <?php else: ?>
                        0<?php echo e($desc->created_at->hour); ?> :
                        :
                        <?php if($desc->created_at->minute < 10): ?>
                            0<?php echo e($desc->created_at->minute); ?> AM
                        <?php else: ?>
                            <?php echo e($desc->created_at->minute); ?> AM
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
                <td ><?php echo e($desc->created_at->toFormattedDateString()); ?></td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <?php echo $__env->make('master.progress', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>