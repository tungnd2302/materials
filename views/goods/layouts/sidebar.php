<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <?php require_once('views/elements/user_logo.php')  ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="?controller=categories&action=list" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Quản lý loại vật tư
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="?controller=products&action=list" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Quản lý vật tư
                </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
