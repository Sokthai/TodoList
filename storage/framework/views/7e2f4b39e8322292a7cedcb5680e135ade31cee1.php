<?php $__env->startSection('title'); ?>
    Todo: myTodoList
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div>
        <h1 class="todoTitle">Todo Lists:</h1>
        <h6 class="todoTemp"><?php echo e($location); ?>: <?php echo e($temp_f); ?> Fahrenheit</h6>
        <div class="row">
            <div class="col-md-7"><h3><?php echo e($total); ?></h3></div>
            <div class="col-md-5 todoTemp mouseHover" style="float: right;">
                <a href="/?offset=-1" style="font-size: 15px;">Show All</a>
                <a href="/?offset=0" style="font-size: 15px;">&laquo; First</a>
                <a href="/?offset=-10" style="font-size: 15px;">Last  &raquo;</a>
                <a href="/?offset=<?php echo e($offset - 10); ?>" class="previous" style="font-size: 18px;">&laquo; Previous</a>
                <a href="/?offset=<?php echo e($offset + 10); ?>" class="next" style="font-size: 18px;">Next &raquo;</a>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="alert-success">
            <tr class="danger">
                <td>No</td>
                <td>Project Name</td>
                <td>Complete</td>
                <td>Closing</td>
                <td>Delete</td>
            </tr>
            </thead>
            <tbody>


            <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="success">
                    <td width="5"><?php echo e($index + 1); ?></td>
                    <td>
                        <h3><a href="/<?php echo e($todo->name); ?>" class="blog-post-title <?php echo e($todo->closing == 1? "statusComplete" : "statusInComplete"); ?>"><?php echo e(title_case($todo->name)); ?></a>
                            <?php echo e(($todo->favorite === 1)? " &#11088;" : ""); ?></h3>
                        <h6 class="blog-post-meta">
                            &nbsp;	<span style="color: #8a6d3b"><?php echo e(ucfirst($todo->type)); ?></span>
                            <?php echo e($todo->created_at->diffForHumans(null)); ?>

                        </h6>

                            <h5 class="blog-header">
                                &nbsp;	<?php echo e(str_limit(ucfirst($todo->description->last()->description), 50)); ?>

                            </h5>


                    </td>
                    <td width="5"><input type="checkbox" disabled <?php echo e($todo->complete? 'checked' : null); ?>/></td>
                    <td width="5"><input type="checkbox" disabled <?php echo e($todo->closing? 'checked' : null); ?>/></td>
                    <td width="10"><input type="checkbox" value="<?php echo e($todo->id); ?>" name="delete" id="delete"/></td>
                </tr>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>











<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>