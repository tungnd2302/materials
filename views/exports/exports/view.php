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
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">
                        Chi tiết đơn hàng <?php echo $request['id']; ?>
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
                <div class="card-body">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span>Thông tin vận chuyển</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div>Họ và tên người nhận</div>
                                    <div class="ml-auto"><?php echo $item['fullname']  ?></div>
                                </div>
                                <div class="d-flex mt-4">
                                    <div>Địa chỉ nhận hàng</div>
                                    <div class="ml-auto"><?php echo $item['address']  ?></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div>Số điện thoại</div>
                                    <div class="ml-auto"><?php echo $item['phone']  ?></div>
                                </div>
                                <div class="d-flex mt-4">
                                    <div>Trạng thái đơn hàng</div>
                                    <div class="ml-auto"><?php echo ($item['status'] == 'notdeliveried') ? 'Chưa được giao' : 'Đã giao'  ?></div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-danger">
                            <span>Thông tin đơn hàng</span>
                        </div>
                        <div class="card-body">
                           <table class="table table-border">
                                <tr>
                                    <th>#</th>
                                    <th>Tên vật tư</th>
                                    <th>Loại vật tư</th>
                                    <th>Tên đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                                <?php if(count($productArr) > 0):  ?>
                                    <?php foreach($productArr as $key => $item): ?>
                                        <tr>
                                            <td><?php echo ++$key   ?></td>
                                            <td><?php echo $item['product_name']  ?></td>
                                            <td><?php echo $item['category_name']  ?></td>
                                            <td><?php echo $item['price']  ?></td>
                                            <td><?php echo $item['quantity']  ?></td>
                                            <td><?php echo $item['total']  ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="5"><b>Tổng đơn hàng</b></td>
                                        <td><?php echo $item['export_total']  ?></td>
                                    </tr>
                                <?php endif; ?>
                                        

                           </table>
                        </div>
                    </div>
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
