<?php
session_start();
require('../../Controllers/checkUser.php');
include '../../../Models/customer_db.php';
include '../../../Models/user_Db.php';
include '../../../Models/product_db.php';
$customer = getAllCustomers();
$user = checkLogin($username);
$products = getAllProduct();
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
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Thêm mới đơn hàng</h4>
            <form class="forms-sample" action="../../Controllers/orderController.php?type=them" enctype="multipart/form-data" method="POST">
              <div class="form-group">
                <label for="exampleInputName1">CustomerName</label>
                <select class="form-control" name="customerId" required>
                  <option value="" selected>--- Mời chọn khách hàng ---</option>
                  <?php foreach ($customer as $cus) { ?>
                    <option value="<?php echo $cus['Id'] ?>"><?php echo $cus['CustomerName'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPrice1">Trạng thái</label>
                <select class="form-control" name="statusorder" id="statuscbb">
                  <option value="Đặt hàng">Giao hàng tận nơi</option>
                  <option value="Nhận hàng">Nhận hàng tại cửa hàng</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPrice1">ShippingAddress</label>
                <input type="text" class="form-control" placeholder="Address" name="shippingaddress">
              </div>
              <div class="form-group">
                <label for="exampleInputPrice1">ShippingCity</label>
                <select class="form-control" name="shippingcity" >
                  <option value="Hà nội">Hà nội</option>
                  <option value="Đà Nẵng">Đà Nẵng</option>
                  <option value="TP HCM">TP HCM</option>
                </select>
              </div>
              <div class="form-group">
                <label for="statuspayment">Thanh toán</label>
                <select class="form-control" id="paymentcbb" name="statuspayment">
                  <option value="Thanh toán tiền mặt" selected>Thanh toán tiền mặt</option>
                  <option value="Thanh toán chuyển khoản">Thanh toán chuyển khoản</option>
                  <option value="Trả góp có lãi suất">Trả góp có lãi suất</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Sản phẩm</label>
                <select class="form-control" name="productId" required>
                  <option value="" selected>--- Mời chọn sản phẩm ---</option>
                  <?php foreach ($products as $pro) { ?>
                    <option value="<?php echo $pro['ProductId'] ?>"><?php echo $pro['ProductName'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <!-- <div class="form-group">
                  <label for="exampleInputName1">Thành tiền</label>
                  
                </div> -->
              <button type="submit" class="btn btn-success mr-2">Thêm mới</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
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