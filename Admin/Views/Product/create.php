<?php
require('../../Controllers/checkUser.php');
include '../../../Models/brand_db.php';
include '../../../Models/category_db.php';
$brands = getAllBrands();
$categories = getAllCategory();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Products Management</title>
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
                    <h3>Product Management</h3>
                </center>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Quản lý mặt hàng</h4>
                        <p class="card-description"></p>
                        <form class="forms-sample" action="../../Controllers/productController.php?type=them" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label for="exampleInputName1">Product Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Product Name" name="productname">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPrice1">Price</label>
                                <input type="text" class="form-control" id="exampleInputPrice1" placeholder="Price" name="price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDiscount1">Discount</label>
                                <input type="text" class="form-control" id="exampleInputDiscount1" placeholder="Discount" name="discount">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" class="form-control" accept="image/jpeg, image/png" placeholder="Image" name="img">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Brand</label>
                                <select class="form-control" name="brandid">
                                    <?php foreach ($brands as $brand) { ?>
                                        <option value="<?php echo $brand[0] ?>"><?php echo $brand[1] ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Category</label>
                                <select class="form-control" name="categoryid">
                                    <?php foreach ($categories as $cate) { ?>
                                        <option value="<?php echo $cate[0] ?>"><?php echo $cate[1] ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea class="form-control" id="exampleTextarea1" rows="2" name="des" placeholder="Description"></textarea>
                            </div>
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