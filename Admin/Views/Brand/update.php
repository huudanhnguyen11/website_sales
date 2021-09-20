<?php
require('../../Controllers/checkUser.php');
include '../../../Models/brand_db.php';
$id = $_GET['id'];
$brands = getBrand($id);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Brand Management</title>
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
            <h3>Update Brand</h3>
        </center>
        <div class="container-fluid">
            <div class="card-body">
            <form action="../../Controllers/brandController.php?type=sua" method="POST">
            <?php foreach ($brands as  $brand_update) { ?>
                <input type="hidden" name="id" value="<?php echo $brand_update[0]; ?>">
                <input class="form-control" type="text" name="name_update" value="<?php echo $brand_update[1]; ?>" required>
                <br>
                <br>
                <input class="form-control" type="text" name="description_update" value="<?php echo $brand_update[2]; ?>">
                <br>
                <br>
                <button class="btn btn-success mr-2" type="submit">Cập nhật</button>
                <?php }; ?>
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
