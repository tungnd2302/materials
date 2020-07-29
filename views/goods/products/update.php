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
                  Sửa <?php echo $this->listName ?>
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
                        <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $item['name'] ?>">
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Đơn vị</label>
                        <input type="text" name="type" class="form-control" value="<?php echo isset($_POST['type']) ? $_POST['type'] : $item['type'] ?>">
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Loại vật tư</label>
                        <select name="categoryid"  class="form-control">
                          <?php foreach($categories as $category): ?>
                            <?php if(isset($_POST['categoryid'])): ?>
                                <option value='<?php echo $category['id'] ?>' <?php echo ( $category['id'] == $_POST['categoryid']) ? "selected='true'" : '' ?>><?php echo $category['name'] ?></option>
                            <?php else: ?>
                                <option value='<?php echo $category['id'] ?>' <?php echo ( $category['id'] == $item['categoryid']) ? "selected='true'" : '' ?>><?php echo $category['name'] ?></option>
                            <?php endif; ?>>
                          <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Nhà cung cấp</label>
                        <input type="text" name="suplier" class="form-control" value="<?php echo isset($_POST['suplier']) ? $_POST['suplier'] : $item['suplier'] ?>">
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Số lượng nhập</label>
                        <input type="text" name="quanlity" class="form-control" value="<?php echo isset($_POST['quanlity']) ? $_POST['quantity'] : $item['quanlity'] ?>">
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Giá nhập</label>
                        <input type="text" name="price" class="form-control" value="<?php echo isset($_POST['price']) ? $_POST['price'] : $item['price'] ?>">
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Trạng thái</label>
                        <select name="enable" class="form-control"> 
                            <?php if(isset($_POST['enable'])): ?>
                                <option value="active" <?php echo ($_POST['enable'] == 'active') ? "selected='true'" : ''  ?>>Kích hoạt</option>
                                <option value="inactive" <?php echo ($_POST['enable'] == 'inactive') ? "selected='true'" : ''  ?>>Không kích hoạt</option>
                            <?php else: ?>
                                <option value="active" <?php echo ($item['enable'] == 'active') ? "selected='true'" : ''  ?>>Kích hoạt</option>
                                <option value="inactive" <?php echo ($item['enable'] == 'inactive') ? "selected='true'" : ''  ?>>Không kích hoạt</option>
                            <?php endif; ?>>
                        </select>
                    </div>

                    <div class="form-group pr-4 pl-4">
                        <label for="">Ảnh vật tư</label>
                        <input type='file' name="thumb" class="form-control">
                    </div>
                    <?php if(!empty($item['thumb'])): ?>
                      <div class="form-group pr-4 pl-4">
                        <div style="width:150px;height: 150px; border: 1px solid #333;">
                              <img src="assets/materials/images/products/<?php echo trim($item['thumb']) ?>" class="img-fluid" alt="">
                        </div>
                      </div>
                    <?php endif; ?>
               
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-success" name="update">Lưu</button>
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
