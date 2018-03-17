<?php $__env->startSection('title'); ?>
    Slide - Danh Sách
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh Sách Slide</h2>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <table class="table table-bordered">
                            <thead>
                            <tr>

                                <th>Ảnh</th>
                                <th>Thứ Tự</th>

                                <th>Hành Động</th>
                                <th>Hành Động</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = \Illuminate\Support\Facades\DB::table('slider')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                <tr>
                                    <td><img width="100px" src="<?php echo e(url('public/sliders/'.$item->img)); ?>"></td>
                                    <td><?php echo e($item->order); ?></td>

                                    <td>
                                        <a class="btn btn-danger" href="<?php echo e(url('admin/slider/xoa/' . $item->id )); ?>" onclick="return confirm('Bạn chắc chắn muốn xóa ?')">
                                            Xóa
                                        </a>
                                    </td>

                                    <td>
                                        <a class="btn btn-danger" href="<?php echo e(url('admin/slider/sua/' . $item->id )); ?>" >
                                            Sửa
                                        </a>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>