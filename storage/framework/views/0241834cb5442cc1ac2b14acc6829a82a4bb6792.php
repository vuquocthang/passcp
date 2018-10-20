<div id="changeGroup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chuyển Nhóm</h4>
            </div>
            <div class="modal-body">
                <form id="change-group-form" action="#" class="form-horizontal form-label-left">

                    <?php echo e(csrf_field()); ?>


                    <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn nhóm</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="change_group_id" class="form-control" >
                                <option value="">Chọn Nhóm</option>
                                <?php $__currentLoopData = $user->groups()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($group->id); ?>" <?php echo e(Request::get('group_id') == $group->id ? 'selected' : ''); ?>><?php echo e($group->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                            <button type="submit" class="btn btn-success">Chuyển</button>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>