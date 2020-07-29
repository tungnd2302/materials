<?php  require_once('views/exports/layouts/header.php'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php require_once('views/exports/layouts/breadcrumb.php'); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <?php require_once("views/exports/$this->controllerName/filter.php") ?>
        
        <div class="row">
            <div class="col-md-12">
            <div class="card">
              <?php require_once("views/exports/layouts/card_header.php") ?>
              <div class="card-body p-0">
                <table class="table table-border">
                  <thead>
                    <th>#</th>
                    <th>Mã xuất hàng</th>
                    <th>Tổng giá trị hàng</th>
                    <th>Ngày tạo</th>
                    <th>Người tạo</th>
                    <th>Thao tác</th>
                  </thead>
                  <tbody>
                    <?php if(count($items) > 0): ?>
                        <?php foreach($items as $key => $item): ?>
                            <tr>
                              <?php
                                  $name = $item['name'];
                                  $status   = ($item['enable'] == 'active') ? 'Kích hoạt' : 'Không kích hoạt';
                                  $created   = $item['created'];
                                  $createdby   = $item['createdby'];
                              ?>
                                <td><?php echo $key + 1  ?></td>
                                <td><?php echo $name  ?></td>
                                <td><?php echo $status  ?></td>
                                <td><?php echo $created  ?></td>
                                <td><?php echo $createdby  ?></td>
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
                    <?php else: ?>
                      <tr>
                        <td colspan="6">
                          <b>Không tồn tại bản ghi </b>
                        </td>
                      </tr>
                    <?php endif ?>
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
<?php  require_once('views/exports/layouts/footer.php'); ?>
