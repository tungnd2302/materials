<?php  require_once('views/exports/layouts/header.php'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php require_once('views/exports/layouts/breadcrumb.php'); ?>
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
              <div class="card-body pl-3 pr-3">
                   <?php  if(isset($_SESSION['error'])): ?>
                    <div class="form-group mt-3">
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Không thành công!</strong> <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                      </div>
                    </div>
                   <?php endif; ?>
                    <input type="hidden" name="id" value="<?php echo (isset($item['id'])) ? $item['id'] : ''  ?>">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="card">
                            <div class="card-header bg-primary">
                                <span>Thông tin về vật tư</span>
                            </div>
                            <div class="card card-body material-card-body">
                              <div class="total-material">
                                <div class="form-group">
                                  <label for="">Tên vật tư</label>
                                  <input name="name[]" type="text" class="tags1 form-control" >
                                  <!-- <input type="text" class="tags2 form-control" autocomplete="off"> -->
                                </div>

                                <div class="form-group">
                                  <label for="">Số lượng</label>
                                  <input type="text" name="quantity[]" class="form-control">
                                </div>
                              </div>
                              <!-- <div class="material-card-body"></div> -->

                            </div>
                            <div class="card-footer">
                              <a class="btn btn-danger" id="add-materials" >
                                <span style="color:aliceblue">Thêm vật tư</span> 
                              </a>
                              <a class="btn btn-default" id="remove-materials" style="display:none">
                                Xóa vật tư
                              </a>
                            </div>

                            </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card" style="display:unset">
                          <div class="card-header bg-primary">
                              <span>Thông tin vận chuyển</span>
                          </div>
                          <div class="card card-body">
                            <div class="form-group">
                              <label for="">Họ tên người nhận</label>
                              <input type="text" name="fullname" class="form-control" value="">
                            </div>

                            <div class="form-group">
                              <label for="">Địa chỉ</label>
                              <input type="text" name="address" class="form-control" value="">
                            </div>

                            <div class="form-group">
                              <label for="">Số điện thoại</label>
                              <input type="text" name="phone" class="form-control" value="">
                            </div>
                            <!-- <div class="material-card-body"></div> -->
                          </div>

                          

                          </div>
                        </div>
                      </div>
                    </div>
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
<?php  require_once('views/exports/layouts/footer.php'); ?>
<?php  require_once('views/exports/layouts/create_script.php'); ?>
