<?php $__env->startSection('title'); ?>
    Tour - Sửa
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

    <link rel="stylesheet" href="<?php echo e(url('public/admin/gentelella')); ?>/vendors/dropify/dist/css/dropify.min.css">

    <script src="<?php echo e(url('public/ckeditor/')); ?>/ckeditor.js"></script>
    <script src="<?php echo e(url('public/ckeditor/')); ?>/samples/js/sample.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sửa</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">



                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Home</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Chương Trình Tour</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Giá</a>
                                </li>

                                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Điều Khoản</a>
                                </li>

                                <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Liên Hệ</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">

                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" action="<?php echo e(url('admin/tour/sua/' . $tour->id)); ?>" method="post" enctype="multipart/form-data">

                                        <?php echo e(csrf_field()); ?>




                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="title" value="<?php echo e($tour->title); ?>" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mã <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" value="<?php echo e($tour->code); ?>" name="code" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Loại<span class="required">*</span>
                                            </label>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="cat_id">
                                                    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <option value="<?php echo e($c->id); ?>" <?php echo e($tour->cat_id == $c->id ? 'selected' : ''); ?> ><?php echo e($c->name); ?></option>

                                                        <?php if( count($c->childs()) > 0): ?>
                                                            <?php $__currentLoopData = $c->childs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <option value="<?php echo e($ch->id); ?>" <?php echo e($tour->cat_id == $ch->id ? 'selected' : ''); ?>> - <?php echo e($ch->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ảnh <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12" >
                                                <input type="file" name="img" id="input-file-now" class="form-control col-md-7 col-xs-12 dropify" data-default-file="<?php echo e($tour->photo()); ?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giá <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" value="<?php echo e($tour->price); ?>" name="price" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giảm Giá <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="number" id="first-name" name="discount" value="<?php echo e($tour->discount); ?>" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giá Online<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="number" id="first-name" name="online_p" value="<?php echo e($tour->online_p); ?>" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Khởi Hành <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="date" id="first-name" name="khoi_hanh" value="<?php echo e($tour->khoi_hanh); ?>" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ngày Về <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="date" id="first-name" name="ngay_ve" value="<?php echo e($tour->ngay_ve); ?>"  class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Thời Gian <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="thoi_gian" value="<?php echo e($tour->thoi_gian); ?>" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Điện Thoại Hỗ Trợ <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="phone" value="<?php echo e($tour->phone); ?>" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                                <button type="submit" class="btn btn-success">Sửa</button>
                                            </div>
                                        </div>


                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Chương Trình Tour<span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12" >
                                            <textarea id="ct" name="chuong_trinh"><?php echo $tour->chuong_trinh ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giá<span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12" >
                                            <textarea id="g" name="gia"><?php echo $tour->gia ?></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Điều Khoản<span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12" >
                                            <textarea id="dk" name="dieu_khoan"><?php echo $tour->dieu_khoan ?></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Liên Hệ<span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12" >
                                            <textarea id="lh" name="lien_he"><?php echo $tour->lien_he ?></textarea>
                                        </div>
                                    </div>
                                </div>



                                </form>
                            </div>
                        </div>



                        <br>



                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(url('public/admin/gentelella')); ?>/vendors/dropify/dist/js/dropify.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.dropify').dropify({
                messages: {
                    'default': 'Upload Ảnh',
                    'replace': 'Chọn Ảnh Khác',
                    'remove':  'Xóa',
                    'error':   'Có Lỗi Xảy Ra!'
                }
            });

        });
    </script>

    <script>
        var editor = CKEDITOR.replace( 'ct' );

        // The "change" event is fired whenever a change is made in the editor.
        editor.on( 'change', function( evt ) {
            // getData() returns CKEditor's HTML content.
            var data = CKEDITOR.instances.editor.getData();

            console.log( 'Total bytes: ' + data );
        });

        var editor = CKEDITOR.replace( 'g' );
        var editor = CKEDITOR.replace( 'dk' );
        var editor = CKEDITOR.replace( 'lh' );

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>