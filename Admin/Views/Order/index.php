<?php
require('../../Controllers/checkUser.php');
include '../../../Models/order_db.php';
$orders = getAllOrdersbyCustomer();
$message = "";
if (isset($_GET["mes"])) {
  $message = $_GET["mes"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Order Management</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
  <link rel="stylesheet" href="../../assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/shared/style.css">
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../../assets/css/demo_1/style.css">
  <!-- End Layout styles -->
  <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include '../_navbar.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include '../_sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <center>
          <h3>Order Management</h3>
        </center>
        <div>
          <a class="btn btn-success btn-fw" href="create.php">Thêm mới</a>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Tên khách hàng</th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th>Thanh toán</th>
                <th>Chi tiết</th>
                <th>Sửa</th>
                <th>Xóa</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($orders as $o) { ?>
                <tr>
                  <td><?php echo $o['OrderId'] ?></td>
                  <td><a href="../Customer/update.php?id=<?php echo $o['CustomerId'] ?>"><?php echo $o['CustomerName'] ?></a></td>
                  <td><?php echo date("d-m-Y", strtotime($o['CreatedDate'])) ?></td>
                  <td><?php echo $o['StatusOrder'] ?></td>
                  <td><?php echo $o['PaymentType'] ?></td>
                  <td><a href="../Orderdetails/index.php?id=<?php echo $o['OrderId'] ?>">Chi tiết</a></td>
                  <td>
                  <i class="fa fa-pencil-square-o"></i>
                    <a href="update.php?id=<?php echo $o['OrderId'] ?>">Sửa</a>
                  </td>
                  <td>
                    <a onclick="return confirm('Bạn chắc chắn muốn xóa đơn đặt hàng này ?')" href="../../Controllers/orderController.php?type=xoa&id=<?php echo $o['OrderId']; ?>">Xóa</a>
                  </td>
                </tr>
              <?php  }; ?>
            </tbody>
          </table>
          <center><p style="color: red;"><?php echo $message; ?></p></center>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include '../_footer.php'; ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../assets/js/shared/off-canvas.js"></script>
  <script src="../../assets/js/shared/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../assets/js/demo_1/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script src="../../assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>