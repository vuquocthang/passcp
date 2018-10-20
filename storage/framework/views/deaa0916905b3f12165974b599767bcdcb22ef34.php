<div id="addGroup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm Nhóm</h4>
            </div>
            <div class="modal-body">
                <form id="add-group-form" data-parsley-validate="" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                    <?php echo e(csrf_field()); ?>



                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên Nhóm <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="group-name" name="name" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                            <button type="submit" class="btn btn-success">Thêm</button>
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
