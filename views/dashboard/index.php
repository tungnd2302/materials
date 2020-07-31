<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/template/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="assets/materials/css/default.css">
  <link rel="stylesheet" href="assets/materials/css/top_head.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        Xin chào, <?php echo $_SESSION['user']['fullname'] ?>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <li class="user-header">
                <img src="assets/materials/images/users/<?php echo trim($_SESSION['user']['thumb']) ?>" class="img-circle img-fluid" alt="User Image">
                <p>
                  <?php echo $_SESSION['user']['fullname'] ?>
                  <br>
                  <small><?php echo ucfirst($_SESSION['user']['rolename']) ?> trong phòng ban <?php echo ucfirst($_SESSION['user']['deptname']) ?></small>
                </p>
          </li>
          <li class="user-footer d-flex p-2">
                <!-- <div class="float-left">
                  <a href="?controller=profile&action=view" class="btn btn-default btn-flat">Cá nhân</a>
                </div> -->
                <a href="?controller=dashboard&action=logout" class="btn btn-default btn-flat w-100">Đăng xuất</a>
          </li>
        </ul>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Dashboard</small></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
            <div class="col-md-3">
               <div class="dashboard-item p-4">
                    <div class="border-dark bg-white text-center" style="border-radius:40px;">
                            <img src="assets/materials/images/Dashboard_icon/user.png" alt="" class="img-fluid w40">
                            <p class="mt-3">
                                <a href="?controller=users&action=list">Quản lý nhân sự</a>
                            </p>
                    </div>
               </div>
            </div>

            <div class="col-md-3">
               <div class="dashboard-item p-4">
                    <div class="border-dark bg-white text-center" style="border-radius:40px;">
                            <img src="assets/materials/images/Dashboard_icon/goods.png" alt="" style="width:90px;height:90px;" class="img-fluid w40">
                            <p class="mt-3">
                                <a href="?controller=categories&action=list">Quản lý mặt hàng</a>
                            </p>
                    </div>
               </div>
            </div>

            <div class="col-md-3">
               <div class="dashboard-item p-4">
                    <div class="border-dark bg-white text-center" style="border-radius:40px;">
                            <img src="assets/materials/images/Dashboard_icon/export.png" alt="" style="width:90px;height:90px;" class="img-fluid w40">
                            <p class="mt-3">
                                <a href="?controller=exports&action=list">Xuất vật liệu</a>
                            </p>
                    </div>
               </div>
            </div>



        </div>
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>


<!-- jQuery -->
<script src="assets/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/template/dist/js/adminlte.min.js"></script>
</body>
</html>
