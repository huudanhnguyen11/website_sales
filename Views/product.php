<?php
$products;
$cateName;
if (isset($_GET['cate']) && $_GET['cate'] > 0) {
    if ($_GET['cate'] == 1) {
        $cateName = 'Máy tính xách tay';
    }else if ($_GET['cate'] == 8){
        $cateName = 'PC, AIO, Server';
    }else if ($_GET['cate'] == 9){
        $cateName = 'Màn hình máy tính';
    }else if ($_GET['cate'] == 10){
        $cateName = 'Linh kiện máy tính';
    }else if ($_GET['cate'] == 11){
        $cateName = 'Chuột';
    }else if ($_GET['cate'] == 12){
        $cateName = 'Bàn phím';
    }else if ($_GET['cate'] == 13){
        $cateName = 'Thiết bị mạng';
    }else if ($_GET['cate'] == 14){
        $cateName = 'Loa, Tai nghe, Audio';
    }
    include '../Models/product_db.php';
    $products = getAllProductByCategoryId($_GET['cate']);
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

<body>
    <!-- header start -->
    <?php include '_header.php'; ?>
    <!-- end header -->
    <!-- nav start -->
    <?php include '_navbar.php' ?>
    <!-- end nav -->
    <div class="body">
        <!-- slider start -->
        <?php include '_slider.php'; ?>
        <!-- end slider -->
        <section class="product-list">
            <div class="container">
                <div class="row">
                    <p>
                    <h2><?php echo $cateName; ?></h2>
                    </p>
                </div>
                <div class="container">
                    <div class="row">
                        <?php foreach ($products as $product) { ?>
                            <div class="col-md-2">
                                <div class="p-item">
                                    <a href="" class="p-img" title="<?php echo $product['ProductName']; ?>">
                                        <img src="<?php echo $product['ProductImage']; ?>" alt="<?php echo $product['ProductName']; ?>" style="opacity: 1;">
                                    </a>
                                    <!-- <span class="p-brand">
                                        <img class="lazy owl-lazy" src="../Assets/img/logoHP.png" alt="HP">
                                    </span> -->
                                    <span class="p-type">
                                        <i class="p-lable new">Hàng mới</i>
                                        <i class="p-lable saleoff">Khuyến mãi</i>
                                    </span>
                                    <span>
                                        <h4 class="p-name">
                                            <a href="" title="<?php echo $product['ProductName']; ?>">
                                                <?php echo $product['ProductName']; ?>
                                            </a>
                                        </h4>
                                    </span>
                                    <p style="font-size: 10px;">
                                        <?php echo $product['Description'] ?></p>
                                            <span class="p-unprice"></span>
                                            <span class="p-price"><?php echo number_format($product['Price'],2) . ' đ'; ?></span>
                                            <a href="../index.php?function=add_cart&product_id=<?php echo $product['ProductId'] ?>" class="addCart">Đặt hàng</a>
                                            <span class="p-promotion">
                                                6 Khuyến mãi: Túi xách đựng laptop, Chuột không dây, Tấm lót chuột.
                                            </span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- footer start -->
    <?php include '_footer.php'; ?>
    <!-- end footer -->
</body>

</html>