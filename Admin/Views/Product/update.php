<?php
require('../../Controllers/checkUser.php');
include '../../../Models/brand_db.php';
include '../../../Models/category_db.php';
include '../../../Models/product_db.php';
$id = $_GET['id'];
$brands = getAllBrands();
$categories = getAllCategory();
$products = getProduct($id);
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
                        <form class="forms-sample" action="../../Controllers/productController.php?type=sua" method="POST">
                            <?php foreach ($products as $pro_update) { ?>
                                <input type="hidden" name="id" value="<?php echo $pro_update[0]; ?>">
                                <div class="form-group">
                                    <label for="exampleInputName1">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputName1" value="<?php echo $pro_update['ProductName'] ?>" name="productname_update">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPrice1">Price</label>
                                    <input type="text" class="form-control" id="exampleInputPrice1" value="<?php echo $pro_update['Price'] ?>" name="price_update">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDiscount1">Discount</label>
                                    <input type="text" class="form-control" id="exampleInputDiscount1" value="<?php echo $pro_update['Dicount'] ?>" name="discount_update">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $pro_update['ProductImage'] ?>" name="img_update">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Brand</label>
                                    <select class="form-control" name="brandid_update" id="brandcbb">
                                        <?php foreach ($brands as $brand) { ?>
                                            <option value="<?php echo $brand[0] ?>"><?php echo $brand[1] ?></option>
                                        <?php }; ?>
                                    </select>
                                    <script>
                                        var brandid = <?php echo $pro_update['BrandId'] ?>;
                                        var selectbrand = document.getElementById("brandcbb");
                                        for (let index = 0; index < <?php echo $brands->rowCount(); ?>; index++) {
                                            if (selectbrand.options[index].value == brandid) {
                                                selectbrand.options[index].selected = 'selected';
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Category</label>
                                    <select class="form-control" name="categoryid_update" id="categorycbb">
                                        <?php foreach ($categories as $cate) { ?>
                                            <option value="<?php echo $cate[0] ?>"><?php echo $cate[1] ?></option>
                                        <?php }; ?>
                                    </select>
                                    <script>
                                        var categoryid = <?php echo $pro_update['CategoryId'] ?>;
                                        var selectcategory = document.getElementById("categorycbb");
                                        for (let index = 0; index < <?php echo $categories->rowCount(); ?>; index++) {
                                            if (selectcategory.options[index].value == categoryid) {
                                                selectcategory.options[index].selected = 'selected';
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Description</label>
                                    <input type="text" class="form-control" id="exampleTextarea1" rows="2" name="des_update" value="<?php echo $pro_update['Description'] ?>"></input>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Cập nhật</button>
                                <button class="btn btn-light">Cancel</button>
                            <?php } ?>
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