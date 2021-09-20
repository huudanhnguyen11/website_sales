<?php
require('../../Controllers/checkUser.php');
include '../../../Models/order_db.php';
include '../../../Models/customer_db.php';
include '../../../Models/orderdetail_db.php';
include '../../../Models/product_db.php';
$id = $_GET['id'];
$order = getOrderbyCustomer($id)->fetch();
$customer = getCustomer($order['CustomerId'])->fetch();
$orderdetail = getOrderdetails($id)->fetch();
$product = getProduct($orderdetail['ProductId'])->fetch();
$total_price = 0;
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
                <h4>Chi tiết đơn hàng</h4>
                <div>
                    <div style="float: left; width: 50%;">
                        <h5>Thông tin khách hàng:</h5>
                        <div style="padding-left: 30px;">
                            <ul style="list-style-type:circle">
                                <li>Tên khách hàng: <?php echo $customer['CustomerName'] ?></li>
                                <li>Số điện thoại: <?php echo $customer['PhoneNumber'] ?></li>
                                <li>Địa chỉ: <?php echo $customer['Address'] ?></li>
                                <li>Email: <?php echo $customer['Email'] ?></li>
                            </ul>
                        </div>
                    </div>
                    <div style="float: right; width: 50%;   ">
                        <h5>Thông tin trạng thái:</h5>
                        <div style="padding-left: 30px;">
                            <ul style="list-style-type:circle">
                                <li>Trạng thái đơn hàng: <?php echo $order['StatusOrder'] ?></li>
                                <li>Trạng thái thanh toán: <?php echo $order['PaymentType'] ?></li>
                                <li>Cách thức nhận hàng: <?php echo $order['ShippingType'] ?></li>
                                <li>Số lượng: <?php echo (int)$orderdetail['Quantity'] ?></li>
                            </ul>
                        </div>
                    </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá tiền</th>
                                    <th>Discount</th>
                                    <th>Image</th>
                                    <th>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>                               
                                    <td><?php echo $product['ProductName'] ?></td>
                                    <td><?php echo $product['Price'] ?></td>
                                    <td><?php echo $product['Dicount'] ?></td>
                                    <td><img width="60px" height="75px" src="<?php echo '../../' . $product['ProductImage'] ?>" alt=""></td>
                                    <td><?php echo $product['Description'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php $total_price += ((int)$product['Price'] * $orderdetail['Quantity']); ?>
                        <div style="float: right; font-size: 1.10em;">
                            <label><b>Tổng tiền: </b><label style="color: red;"><?php echo number_format($total_price, 2); ?> VNĐ</label></label>
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