<?php  require_once('views/employees/layouts/header.php'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php require_once('views/employees/layouts/breadcrumb.php'); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <?php require_once("views/employees/$this->controllerName/filter.php") ?>
        <div class="row">
            <div class="col-md-12">
            <div class="card">
               <?php require_once("views/employees/layouts/card_header.php") ?>  
              <div class="card-body p-0">
                <table class="table table-border">
                  <thead>
                    <th>#</th>
                    <th>Họ tên</th>
                    <th>Username</th>
                    <th>Phòng ban</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </thead>
                  <tbody>
                    <?php foreach($items as $key => $item): ?>
                        <tr>
                          <?php
                              $username = $item['username'];
                              $fullname = $item['fullname'];
                              $deptname = $item['deptname'];
                              $status   = ($item['enable'] == 'active') ? 'Kích hoạt' : 'Không kích hoạt';
                          ?>
                            <td><?php echo $key + 1  ?></td>
                            <td><?php echo $fullname  ?></td>
                            <td><?php echo $username  ?></td>
                            <td><?php echo $deptname  ?></td>
                            <td><?php echo $status  ?></td>
                            <td>
                              <?php 
                                  $editLink = "?controller=" . $this->controllerName . "&action=update&id=" .$item['id'];
                                  $editChangeStatus = "?controller=" . $this->controllerName . "&action=changeStatus&id=" .$item['id'] . "&enable=" . $item['enable'];
                                  $editDelete = "?controller=" . $this->controllerName . "&action=delete&id=" .$item['id'];

                              ?>
                             <a href="<?php echo $editLink ?>" class="btn btn-primary">
                                <i class="fa fa-pencil-alt"></i>
                              </a>
                              <a href="<?php echo $editChangeStatus ?>" class="btn btn-danger">
                                <i class="fa fa-sync"></i>
                              </a>
                              <a href="<?php echo $editDelete ?>" class="btn btn-success">
                                <i class="fa fa-trash"></i>
                              </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            
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
<!-- ./wrapper -->
<?php  require_once('views/employees/layouts/footer.php'); ?>
