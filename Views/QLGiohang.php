<?php
session_start();
$message = "";
if (isset($_GET["mes"])) {
  $message = $_GET["mes"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Assets/bootstrap-5.0.0-beta3/bootstrap-5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/bootstrap-icons-1.4.0/bootstrap-icons-1.4.0/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Assets/CSS/mainCSS.css">
    <script src="../Assets/JS/mainWeb.js"></script>

</head>

<body>
    <!-- header start -->
    <?php include '_header.php'; ?>
    <!-- end header -->
    <!-- nav start -->
    <?php include '_navbar.php' ?>
    <!-- end nav -->
    <div class="body" style="background-color: white;">
        <!-- slider start -->
        <?php include '_slider.php'; ?>
        <!-- end slider -->
        <div class="container">
            <div class="row">
                <div class="main-order">
                    <div class="content">
                    <center><p style="color: red;"><?php echo $message; ?></p></center>
                        <?php
                        if (isset($_SESSION['cart'])) {
                            if (count($_SESSION['cart']) > 0) {
                                $total_price = 0;
                        ?>
                                <p><strong>Để đặt hàng,</strong>quý khách hàng vui lòng kiểm tra sản phẩm, số lượng, giá,
                                    màu sắc và điền các thông tin dưới đây:</p>
                                <div class="list-order">
                                    <aside>
                                        <?php foreach ($_SESSION['cart'] as $item) {
                                            $item_price = $item['soluong'] * $item['Price'];
                                        ?>
                                            <div class="p-item">
                                                <div class="p-img">
                                                    <img src="<?php echo $item['ProductImage'] ?>" alt="">
                                                </div>
                                                <div class="p-entry">
                                                    <a style="font-size: 20px;" href=""><?php echo $item['ProductName'] ?></a>
                                                </div>
                                                <div class="p-price">
                                                    <span><?php echo number_format($item_price, 2) . ' đ'; ?></span>
                                                </div>
                                                <div class="p-quanlity">
                                                    <div class="dm_up_down" style="display: flex;">
                                                        <a href="../index.php?function=update_cart&process=down&product_id=<?php echo (int)$item['ProductId']; ?>" type="button" class="btn btn-danger btn-fw">-</a>
                                                        <label for=""><?php echo $item['soluong'] ?></label>
                                                        <a href="../index.php?function=update_cart&process=up&product_id=<?php echo (int)$item['ProductId']; ?>" type="button" class="btn btn-danger btn-fw">+</a>
                                                        <a href="../index.php?function=delete_cart&product_id=<?php echo (int)$item['ProductId']; ?>" style="margin-left: 10px;" type="button" class="btn btn-danger btn-fw">X</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $total_price += ((int)$item['Price'] * $item['soluong']); ?>
                                        <?php } ?>
                                    </aside>
                                    <div class="total">
                                        <span class="lable">Tổng tiền:</span>
                                        <span class="right"><span><?php echo number_format($total_price, 2); ?></span>đ</span>
                                    </div>
                                </div>
                                <form action="../index.php?function=order" method="POST">
                                    <div class="info-customer">
                                        <div class="step step-1">
                                            <h3 class="title">1. Thông tin khách hàng</h3>
                                            <!-- thong tin khach hang -->
                                            <div class="item-form">
                                                <input type="text" placeholder="Họ và tên" id="buyer_name" name="customerName" required> 
                                            </div>
                                            <div class="item-form">
                                                <input type="text" placeholder="Số điện thoại" id="buyer_mobile" name="phone" required>
                                            </div>
                                            <div class="item-form">
                                                <input type="text" placeholder="Nhập địa chỉ" id="buyer_mobile" name="address" required>
                                            </div>
                                            <div class="item-form">
                                                <input type="text" placeholder="Nhập email" id="buyer_email" name="email" required>
                                            </div>
                                            <div class="item-form">
                                                <input type="text" placeholder="Ghi chú" id="buyer_note" name="description">
                                            </div>
                                        </div>
                                        <div class="step step-2">
                                            <h3 class="title">2. Chọn cách thức nhận hàng</h3>
                                            <p>Chọn phương thức nhận hàng sẽ giúp bạn nhận được sản phẩm nhanh hơn</p>
                                            <div class="step_option">
                                                <input type="radio" id="ship1" name="shippingType" value="Giao hàng tận nơi">
                                                <label for="ship1">Giao hàng tận nơi (Có Phí Giao Hàng)</label>
                                                <input type="radio" id="ship2" name="shippingType" value="Nhận tại cửa hàng">
                                                <label for="ship2">Nhận hàng tại cửa hàng</label>
                                            </div>
                                            <div class="main-order">
                                                <div class="item-form">
                                                    <select required name="shippingCity" id="buyer_province">
                                                        <option value="0">Chọn Tỉnh/Thành phố</option>
                                                        <option value="1">Hà nội</option>
                                                        <option value="2">Đà Nẵng</option>
                                                        <option value="3">TP HCM</option>
                                                    </select>
                                                </div>
                                                <div class="item-form">
                                                    <input required type="text" placeholder="Nhập địa chỉ" name="shippingAddress" id="buyer_address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step step-3">
                                            <h3>3. Chọn hình thức thanh toán</h3>
                                            <div class="method-payment">
                                                <div class="step_option">
                                                    <input type="radio" id="pay1" name="paymentType" value="Tiền mặt">
                                                    <label for="pay1">Thanh toán tiền mặt khi nhận hàng (Tiền Mặt/Quẹt Thẻ ATM,
                                                        Visa, Master)</label>
                                                    <input type="radio" id="pay2" name="paymentType" value="Chuyển khoản">
                                                    <label for="pay2">Thanh toán qua chuyển khoản qua tài khoản ngân hàng
                                                        (khuyên dùng)</label><br>
                                                    <input type="radio" id="pay3" name="paymentType" value="Trả góp">
                                                    <label for="pay3">Trả góp có lãi suất</label>
                                                </div>
                                            </div>
                                            <div class="main-payment">
                                                <div class="content-pay">
                                                    <p>Quý khách sẽ thanh toán bằng tiền mặt khi nhận hàng. Vui lòng bấm nút " Đặt hàng" để hoàn tất.</p>
                                                </div>
                                            </div>
                                            <div class="btn-cart">
                                                <input type="submit" value="Đặt hàng" class="btn_next">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        <?php } else {
                                echo '<b>Giỏ hàng bị rỗng</b>';
                            }
                        } else {
                            echo '<b>Giỏ hàng bị rỗng</b>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <!-- footer start -->
    <?php include '_footer.php'; ?>
    <!-- end footer -->
</body>

</html>