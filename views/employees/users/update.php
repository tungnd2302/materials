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
                <?php echo (isset($user['id'])) ? "Cập nhật" : 'Thêm mới'  ?> <?php echo $this->listName ?>
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
                    <div class="card ">
                        <div class="card-header bg-primary">
                          <p>Thông tin bắt buộc</p>
                        </div>
                        <div class="card-body border-transparent">
                          <input type="hidden" name="id" value="<?php echo (isset($user['id'])) ? $user['id'] : ''  ?>">
                          <div class="form-group pr-4 pl-4">
                              <label for="">Họ và tên</label>
                              <input type="text" name="fullname" class="form-control" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : $employee['fullname'] ?>">
                          </div>

                          <div class="form-group pr-4 pl-4">
                              <label for="">Username</label>
                              <input type="text" name="username" class="form-control" value="<?php echo isset($_POST['username']) ? $_POST['username'] : $user['username'] ?>" <?php echo (isset($user['id'])) ? "readonly='true'" : ''  ?>>
                          </div>

                          <div class="form-group pr-4 pl-4">
                              <label for="">Phòng ban</label>
                              <select name="deptid"  class="form-control">
                                  <?php foreach($depts as $dept): ?>
                                    <?php if(isset($_POST['deptid'])): ?>
                                        <option value='<?php echo $dept['id'] ?>' <?php echo ( $dept['id'] == $_POST['deptid']) ? "selected='true'" : '' ?>><?php echo $dept['name'] ?></option>
                                    <?php else: ?>
                                        <option value='<?php echo $dept['id'] ?>' <?php echo ( $dept['id'] == $employee['deptid']) ? "selected='true'" : '' ?>><?php echo $dept['name'] ?></option>
                                    <?php endif; ?>>
                                    <?php endforeach; ?>
                              </select>
                          </div>

                          <div class="form-group pr-4 pl-4">
                              <label for="">Chức vụ</label>
                              <select name="role" class="form-control">
                                <?php if(isset($_POST['role'])): ?>
                                    <option value='teamlead' <?php echo ($_POST['role'] == 'teamlead') ? "selected='true'" : '' ?>>Teamlead</option>
                                    <option value='member' <?php echo ($_POST['role'] == 'member') ? "selected='true'" : '' ?> >Member</option>
                                <?php else: ?>
                                    <option value='teamlead' <?php echo ($employee['role'] == 'teamlead') ? "selected='true'" : '' ?>>Teamlead</option>
                                    <option value='member' <?php echo ($employee['role'] == 'member') ? "selected='true'" : '' ?> >Member</option>
                                <?php endif; ?>>
                              </select>
                          </div>

                          <div class="form-group pr-4 pl-4">
                              <label for="">Trạng thái</label>
                              <select name="enable" class="form-control"> 
                                    <?php if(isset($_POST['enable'])): ?>
                                        <option value="active" <?php echo ($_POST['enable'] == 'active') ? "selected='true'" : ''  ?>>Kích hoạt</option>
                                        <option value="inactive" <?php echo ($_POST['enable'] == 'inactive') ? "selected='true'" : ''  ?>>Không kích hoạt</option>
                                    <?php else: ?>
                                        <option value="active" <?php echo ($user['enable'] == 'active') ? "selected='true'" : ''  ?>>Kích hoạt</option>
                                        <option value="inactive" <?php echo ($user['enable'] == 'inactive') ? "selected='true'" : ''  ?>>Không kích hoạt</option>
                                    <?php endif; ?>>
                              </select>
                          </div>
                        </div>
                    </div>

                    <div class="card ">
                        <div class="card-header bg-primary">
                          <p>Thông tin bổ sung</p>
                        </div>
                        <div class="card-body border-transparent">
                          <div class="form-group pr-4 pl-4">
                              <label for="">Ngày sinh</label>
                              <input type="text" name="birthday" id="datemask" class="form-control" value="<?php echo (isset($_POST['birthday'])) ? $_POST['birthday'] : $employee['birthday']  ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                          </div>

                          <div class="form-group pr-4 pl-4">
                              <label for="">Email</label>
                              <input type="text" name="email" class="form-control" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : $employee['email']    ?>">
                          </div>

                          <div class="form-group pr-4 pl-4">
                              <label for="">Địa chỉ</label>
                              <input type="text" name="address" class="form-control" value="<?php echo (isset($_POST['address'])) ? $_POST['address'] : $employee['address'] ?>">
                          </div>

                          <div class="form-group pr-4 pl-4">
                              <label for="">Ảnh đại điện</label>
                              <input type='file' name="thumb" class="form-control">
                          </div>
                          <?php if(!empty($employee['thumb'])): ?>
                            <div class="form-group pr-4 pl-4">
                              <div style="width:150px;height: 150px; border: 1px solid #333;">
                                    <img src="assets/materials/images/users/<?php echo trim($employee['thumb']) ?>" class="img-fluid" alt="">
                              </div>
                            </div>
                          <?php endif; ?>

                        </div>
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