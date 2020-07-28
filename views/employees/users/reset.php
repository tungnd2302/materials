<?php  require_once('views/employees/layouts/header.php'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php require_once('views/employees/layouts/breadcrumb.php'); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <div class="row">
            <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">
                    Cập nhật mật khẩu
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-4">
                    <?php  if(isset($_SESSION['error'])): ?>
                        <div class="form-group">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Không thành công!</strong> <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                        </div>
                        </div>
                    <?php endif; ?>
                    <input type="hidden" name="id" value="<?php echo (isset($user['id'])) ? $user['id'] : ''  ?>">
                    <div class="form-group pr-4 pl-4">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $user['username'] ?>" readonly='true'>
                    </div>
                    <div class="form-group pr-4 pl-4">
                        <label for="">Fullname</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $employee['fullname'] ?>" readonly='true'>
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Mật khẩu mới</label>
                        <input type="password" name="password" class="form-control">
                    </div>
              </div>
              <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-success">Lưu</button>
              </div>
              </form>
            </div>
            </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <?php  require_once('views/elements/main_footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<?php  require_once('views/employees/layouts/footer.php'); ?>
<script>
  $(function () {
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  })
 </script>