<?php $__env->startSection('content'); ?>
    <div class="container-fluid app-body app-home">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-3 mt-3">
                    <div class="col-lg-4">
                        <form action="<?php echo e(route('search')); ?>" method="get">
                            <input type="text" id="myInput" name="name" placeholder="Search for names..">
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <form action=" <?php echo e(route('searchdate')); ?>" method="get">
                            <input type="text" id="datepicker" placeholder="Select Date" name="date" autocomplete="off">
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>

                    <div class="col-lg-4">
                        <form action=" <?php echo e(route('type')); ?>" method="get">
                           <select name="type">
                               <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option><?php echo e($ty->type); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>

                </div>
                <br>
                <table  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Group Name

                        </th>
                        <th class="th-sm">Group Type

                        </th>
                        <th class="th-sm">Account Name

                        </th>
                        <th class="th-sm">Post Text

                        </th>
                        <th class="th-sm">Time
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($group->group->name); ?></td>
                        <td><?php echo e($group->group->type); ?></td>
                        <td><?php echo e($group->group->user->name); ?></td>
                        <td><?php echo e(str_limit($group->text,50)); ?></td>
                        <td><?php echo e($group->created_at->timezone(Session::get('timezone'))->format('M j, Y g:ia')); ?></td>
                    </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p>No Group Found</p>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="th-sm">Group Name

                        </th>
                        <th class="th-sm">Group Type

                        </th>
                        <th class="th-sm">Account Name

                        </th>
                        <th class="th-sm">Post Text

                        </th>
                        <th class="th-sm">Time
                        </th>
                    </tr>
                    </tfoot>
                </table>
                <?php echo e($socials->links()); ?>

            </div>
        </div>

    </div>
    <?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {

            $( "#datepicker" ).datepicker();
            var dateTypeVar = $('#datepicker').datepicker('getDate');
            $.datepicker.formatDate('dd-mm-yy', dateTypeVar);
        } );
    </script>

    <?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>