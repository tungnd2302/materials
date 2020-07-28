<?php  require_once('views/goods/layouts/header.php'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php require_once('views/goods/layouts/breadcrumb.php'); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <div class="row">
            <div class="col-md-12">
            <form action="" method="post">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">
                  Thêm mới <?php echo $this->listName ?>
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
              <div class="card-body p-0">
                   <?php  if(isset($_SESSION['error'])): ?>
                    <div class="form-group pr-4 pl-4 mt-3">
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Không thành công!</strong> <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                      </div>
                    </div>
                   <?php endif; ?>
                    <input type="hidden" name="id" value="<?php echo (isset($item['id'])) ? $item['id'] : ''  ?>">
                    <div class="form-group pr-4 pl-4">
                        <label for="">Tên mặt hàng</label>
                        <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Trạng thái</label>
                        <select name="enable" id="" class="form-control">
                            <option value="active" <?php echo (isset($item['name']) && $item['enable'] == 'active') ? "selected='true'" : ''  ?>>Kích hoạt</option>
                            <option value="inactive" <?php echo ( isset($item['name']) && $item['enable'] == 'inactive') ? "selected='true'" : ''  ?>>Không kích hoạt</option>
                        </select>
                    </div>
               
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-success" name="create">Tạo mới</button>
              </div>
              </form>
            </div>
            </div>
          
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
    <?php  require_once('views/elements/main_footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<?php  require_once('views/goods/layouts/footer.php'); ?>
