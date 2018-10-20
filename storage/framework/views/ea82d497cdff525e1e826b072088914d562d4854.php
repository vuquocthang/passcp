<?php $__env->startSection('title'); ?>
Bảng Theo Dõi Tiến Độ
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Bảng Theo Dõi Tiến Độ</h2>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <table class="table table-bordered">
                            <thead>
                            <tr>

                                <th>STT</th>
                                <th>Mốc Thời Gian</th>
                                <th>Ngày Thực Hiện</th>
                                <th>Nội Dung</th>
                                <th>Chủ Trì</th>

                                <th>Thành Phần</th>
                                <th>Căn Cứ Pháp Luật</th>


                                <th>Ghi Chú</th>


                                <th>Hành Động</th>

                                <th>Hành Động</th>

                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($item->moc_tg); ?></td>

                                    <td><?php echo e($item->performDate()); ?></td>

                                    <td><?php echo e($item->content); ?></td>
                                    <td><?php echo e($item->chu_tri); ?></td>

                                    <td><?php echo e($item->thanh_phan); ?></td>

                                    <td><?php echo e($item->pl_content); ?></td>

                                    <td><?php echo e($item->note); ?></td>

                                    <td>
                                        <a class="btn btn-info" href="<?php echo e(url('tien-do/sua/' . $item->id )); ?>">Sửa</a>
                                    </td>

                                    

                                    <td>
                                        <a class="btn btn-danger" href="<?php echo e(url('tien-do/xoa/' . $item->id )); ?>" onclick="return confirm('Bạn chắc chắn muốn xóa ?')">
                                            Xóa
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