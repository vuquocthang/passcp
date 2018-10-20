<?php $__env->startSection('title'); ?>
    Thêm Clone
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm </h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" action="" method="post" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>


                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Chọn nhóm</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="group_id" class="form-control" required>
                                        <?php $__currentLoopData = $user->groups()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addGroup">Thêm Nhóm</button>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="data" rows="10" placeholder="uid|pass|token" required></textarea>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <button type="submit" class="btn btn-success">Thêm</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal add group -->
    <?php echo $__env->make('admin.modals.add_group', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>


<script>

    $(document).ready(function () {
        let url = "<?php echo e(url('group')); ?>"

        $("#add-group-form").bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },

            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: "Tên không được để trống !"
                        }
                    }
                }
            }
        }).on('success.form.bv', function (event) {

            event.preventDefault()
            let $form = $(event.target)


            $.post(url, {
                'name' : $("input[name='name']").val(),
                '_token' : "<?php echo e(csrf_token()); ?>"
            }).done(function (data) {
                //console.log(data)
                $("input[name='name']").val("")
            })

            $form.bootstrapValidator('resetForm', true);
        })
    })

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>