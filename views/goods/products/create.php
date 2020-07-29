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
            <form action="" method="post" enctype="multipart/form-data">
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
                        <label for="">Tên vật tư</label>
                        <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Đơn vị</label>
                        <input type="text" name="type" class="form-control" value="<?php echo isset($_POST['type']) ? $_POST['type'] : '' ?>">
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Loại vật tư</label>
                        <select name="categoryid" id="" class="form-control">
                          <?php if(count($categories) > 0): ?>
                            <?php foreach($categories as $category): ?>
                              <option value="<?php echo $category['id'] ?>" <?php echo (isset($item['categoryid']) && $item['categoryid'] == $category->id) ? "selected='true'" : ''  ?>><?php echo $category['name'] ?></option>
                            <?php endforeach; ?>
                          <?php else: ?>
                              <option value="-1" >Không xác định</option>
                          <?php endif; ?> 
                        </select>
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Nhà cung cấp</label>
                        <input type="text" name="suplier" class="form-control" value="<?php echo isset($_POST['suplier']) ? $_POST['suplier'] : '' ?>">
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Số lượng nhập</label>
                        <input type="text" name="quanlity" class="form-control" value="<?php echo isset($_POST['quanlity']) ? $_POST['quanlity'] : '' ?>">
                    </div>


                    <div class="form-group pr-4 pl-4">
                        <label for="">Giá nhập</label>
                        <input type="text" name="price" class="form-control" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>">
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Trạng thái</label>
                        <select name="enable" id="" class="form-control">
                            <option value="active" <?php echo (isset($item['name']) && $item['enable'] == 'active') ? "selected='true'" : ''  ?>>Kích hoạt</option>
                            <option value="inactive" <?php echo ( isset($item['name']) && $item['enable'] == 'inactive') ? "selected='true'" : ''  ?>>Không kích hoạt</option>
                        </select>
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Ảnh vật tư</label>
                        <input type='file' name="thumb" class="form-control">
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
