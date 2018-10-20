<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin - <?php $__env->startSection('title'); ?> Trang Chủ <?php echo $__env->yieldSection(); ?> </title>

    <!-- Bootstrap -->
    <link href="<?php echo e(url('admin/gentelella')); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(url('admin/gentelella')); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(url('admin/gentelella')); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo e(url('admin/gentelella')); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo e(url('admin/gentelella')); ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo e(url('admin/gentelella')); ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo e(url('admin/gentelella')); ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo e(url('admin/gentelella')); ?>/build/css/custom.min.css" rel="stylesheet">

    <?php echo $__env->yieldContent('css'); ?>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
				  <a href="<?php echo e(url('')); ?>" class="site_title"><i class="fa fa-paw"></i> <span>Trang Quản Trị</span></a>
				</div>

                <div class="clearfix"></div>
				
				<div class="profile clearfix">
				  <div class="profile_pic">
					<img src="<?php echo e(url('admin/gentelella/production')); ?>/images/img.jpg" alt="..." class="img-circle profile_img">
				  </div>
				  <div class="profile_info">
					<span>Xin Chào ,</span>
					<h2>Admin</h2>
				  </div>
				</div>

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>Danh Mục</h3>
                        <ul class="nav side-menu">
                            <li>
                                <a href="<?php echo e(url('add')); ?>">
                                    <i class="fa fa-windows"></i>
                                    Thêm Clone
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo e(url('clones')); ?>">
                                    <i class="fa fa-windows"></i>
                                    Clones
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo e(url('name/add')); ?>">
                                    <i class="fa fa-windows"></i>
                                    Thêm Tên
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Đăng Xuất" href="<?php echo e(url('admin/logout')); ?>">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <?php echo e(\Illuminate\Support\Facades\Auth::user()->username); ?>

                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="<?php echo e(url('logout')); ?>"><i class="fa fa-sign-out pull-right"></i> Đăng Xuất</a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

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


                                        <th>Tài Liệu</th>
                                        <th>Ghi Chú</th>


                                        <th>Hành Động</th>

                                        <th>Hành Động</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        <?php echo $__env->yieldSection(); ?>

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo e(url('admin/gentelella')); ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.5/dist/sweetalert2.all.min.js"></script>
<?php echo $__env->yieldContent('js'); ?>

<!-- Custom Theme Scripts -->
<script src="<?php echo e(url('admin/gentelella')); ?>/build/js/custom.min.js"></script>

</body>
</html>
