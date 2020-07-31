<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        
        <a href="?controller=dashboard&action=index" class="nav-link">Dashboard</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Menu tài khoản người dùng -->
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
                <div class="float-left">
                  <a href="?controller=profile&action=view" class="btn btn-default btn-flat">Cá nhân</a>
                </div>
                <div class="ml-auto">
                <a href="?controller=dashboard&action=logout" class="btn btn-default btn-flat">Đăng xuất</a>
                </div>
              </li>
        </ul>
      </li>
     
    </ul>
  </nav>