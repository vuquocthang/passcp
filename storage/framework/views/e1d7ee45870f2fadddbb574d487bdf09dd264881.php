<?php $__env->startSection('title'); ?>
    Clones
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh Sách Clone</h2>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br>
                        <form id="clones-filter" data-parsley-validate="" class="form-horizontal form-label-left" action="">

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Chọn nhóm</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <select name="group_id" class="form-control" onchange="$('#clones-filter').submit()">

                                        <option value="all">All</option>
                                        <?php $__currentLoopData = $user->groups()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($group->id); ?>" <?php echo e(Request::get('group_id') == $group->id ? 'selected' : ''); ?>><?php echo e($group->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#changeGroup" id="changeGroupFilterBtn">Chuyển Nhóm</button>
                                </div>

                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <button type="button" class="btn btn-success" id="changeNameFilterBtn">Đổi Tên</button>
                                </div>

                                <div class="col-md-1 col-sm-1 col-xs-12">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#changePass" id="changePassFilterBtn">Đổi Pass/Email</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="x_content">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="checkAll" checked>
                                    </th>
                                    <th>STT</th>
                                    <th>Nhóm</th>
                                    <th>Uid</th>
                                    <th>Password</th>
                                    <th>Trạng Thái</th>
                                    <th>Ngày Backup </th>
                                    <th>Check</th>
                                    <th>Xóa</th>
                                    <th>Backup</th>
                                    <th>Pass Checkpoint</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $clones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $clone): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="check" class="check" value="<?php echo e($clone->id); ?>" checked>
                                    </td>

                                    <td><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($clone->group() ? $clone->group()->name : ''); ?></td>

                                    <td><?php echo e($clone->uid); ?></td>

                                    <td><?php echo e($clone->pw); ?></td>

                                    <td class="status-<?php echo e($clone->id); ?>"><?php echo e($clone->status); ?></td>
                                    <td><?php echo e($clone->backupAt()); ?></td>

                                    <td>
                                        <a class="btn btn-primary" onclick="check(<?php echo e($clone->id); ?>)">
                                            Check
                                        </a>
                                    </td>

                                    <td>
                                        <a class="btn btn-danger" href="<?php echo e(url('delete/' . $clone->id)); ?>" onclick="return confirm('Bạn chắc chắn muốn xóa ?')">
                                            Xóa
                                        </a>
                                    </td>

                                    <?php if($clone->type == 'LiveWhenSave'): ?>
                                    <td>
                                        <a class="btn btn-primary backup-<?php echo e($clone->id); ?>" onclick="backup(this, <?php echo e($clone->id); ?>)"  >
                                            Backup
                                        </a>
                                    </td>
                                    <?php elseif($clone->type == 'CheckpointWhenSave'): ?>
                                        <td>
                                            <button class="btn btn-primary" onclick="backupByFriend(<?php echo e($clone->id); ?>)"  >
                                                Backup
                                            </button>
                                        </td>
                                    <?php endif; ?>


                                    <td>
                                        <button class="btn btn-primary" id="passcp-<?php echo e($clone->id); ?>" onclick="passCheckpoint(<?php echo e($clone->id); ?>)" >
                                            Pass Checkpoint
                                        </button>
                                    </td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Change pass modal-->
    <?php echo $__env->make('admin.modals.change_pass', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.modals.change_group', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- End change pass modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

    <!-- Checkbox-->
    <script>

        $(document).ready(function () {
            $('.checkAll').on('click', function () {
                $(this).closest('table').find('tbody :checkbox')
                    .prop('checked', this.checked)
                    .closest('tr').toggleClass('selected', this.checked);
            });

            $('tbody :checkbox').on('click', function () {
                $(this).closest('tr').toggleClass('selected', this.checked); //Classe de seleção na row

                $(this).closest('table').find('.checkAll').prop('checked', ($(this).closest('table').find('tbody :checkbox:checked').length == $(this).closest('table').find('tbody :checkbox').length)); //Tira / coloca a seleção no .checkAll
            });
        });
    </script>

    <!-- Chuyển nhóm -->
    <script>
        let url = "<?php echo e(url('/group/change')); ?>"

        $("#change-group-form").bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },

            fields: {
                change_group_id: {
                    validators: {
                        notEmpty: {
                            message: "Vui lòng chọn nhóm !"
                        }
                    }
                }
            }
        }).on('success.form.bv', function (event) {

            event.preventDefault()
            let $form = $(event.target)

            //disable filter change group button
            $("#changeGroupFilterBtn").prop("disabled", true)

            let chechedArray = Array();

            $('.check:checked').each(function() {
                chechedArray.push($(this).val());
            });

            //send request to server
            $.post(url, {
                '_token' : "<?php echo e(csrf_token()); ?>",
                'change_group_id' : $("[name='change_group_id']").find(":selected").val(),
                'ids' : chechedArray
            }).done(function (data) {
                console.log(data)

                //show message
                swal("Đã chuyển nhóm xong !")
            }).always(function () {
                //show message
                swal("Đã chuyển nhóm xong !")

                //enable filter change group button
                $("#changeGroupFilterBtn").prop("disabled", false)

                //xóa các hàng đã chuyển
                for(var i=0; i<chechedArray.length; i++){
                    $("tr").each(function () {
                        if($(this).find(".check").val() == chechedArray[i]){
                            $(this).remove()
                        }
                    })
                }
            }).fail(function (data) {
                console.log("failed : " + data.message)
            })

            $form.bootstrapValidator('resetForm', true);

            //ẩn change group modal
            $("#changeGroup").modal("hide")
        })
    </script>
    <!-- End chuyển nhóm -->

    <!-- Đổi tên -->
    <script>
        $("#changeNameFilterBtn").click(function () {
            //disable click changeNameFilterBtn
            $(this).prop("disabled", true)
            $(this).text("Đang Đổi Tên")

            console.log("change name")

            let url = "<?php echo e(url('name/change')); ?>"
            let chechedArray = Array();

            $('.check:checked').each(function() {
                chechedArray.push($(this).val());
            });

            $.post(url, {
                '_token' : "<?php echo e(csrf_token()); ?>",
                'ids' : chechedArray
            }).done(function (data) {
                console.log(data)

                $("#changeNameFilterBtn").text("Đã Đổi Tên")
                setTimeout(function () {
                    $("#changeNameFilterBtn").text("Đổi Tên")
                    $("#changeNameFilterBtn").prop("disabled", false)
                }, 5000)
            })
        })
    </script>
    <!-- End đổi tên -->

    <!-- Đổi pass -->

    <!-- End đổi pass -->

    <script>
        var backup = function(thiz, cloneId){
            console.log('backup')

            let url = "<?php echo e(url('backup')); ?>/" + cloneId

            thiz.innerHTML = "Đang Backup"
            $(".backup-" + cloneId).unbind("click")

            $.get(url).done(function () {
                thiz.innerHTML = "Đã Backup"

                swal('Đã backup xong')

                setTimeout(function () {
                    thiz.innerHTML = "Backup"

                    $(".backup-" + cloneId).bind("click")
                }, 5000)
            })
        }

        var backupByFriend = function(cloneId){

            (async function getText () {
                const {value: token} = await swal({
                    input: 'textarea',
                    inputPlaceholder: 'Nhập token bạn bè',
                    showCancelButton: true
                })

                if (token) {
                    //swal()
                    let url = "<?php echo e(url('backupByFriend')); ?>/" + cloneId

                    $.get(url, {
                        'token' : token
                    }).done(function (data) {
                        console.log(data)

                        swal(data)
                    })
                }

            })()
        }

        var check = function (cloneId) {
            console.log('check')

            let url = "<?php echo e(url('isCheckpoint')); ?>/" + cloneId

            $.get(url).done(function (data) {
                $(".status-" + cloneId).text(data)

                swal('Clone : ' + data)

                console.log(data)
            })
        }

        var passCheckpoint = function(cloneId){
            console.log(cloneId)

            //vô hiệu hóa button
            $('passcp-' + cloneId).prop('disabled', true)

            let url = "<?php echo e(url('passCheckpoint')); ?>/" + cloneId

            $.get(url).done(function (data) {
                if(data == 'Live'){
                    swal('Clone không bị checkpoint !')
                }

                if(data == 'Đã xong'){
                    swal('Đã vượt checkpoint !')
                }

                if(data == 'Có lỗi'){
                    swal('Có lỗi xảy ra !')
                }

            }).always(function () {
                $('passcp-' + cloneId).prop('disabled', false)
            })
        }
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>