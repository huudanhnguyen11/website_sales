<?php
require('../../Controllers/checkUser.php');
include '../../../Models/user_Db.php';
$id = $_GET['id'];
$users = getUser($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Users Management</title>
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
                    <h1>USERS MANAGEMENT</h1>
                </center>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Quản lý nhân viên</h4>
                        <form class="forms-sample" action="../../Controllers/userController.php?type=sua" method="post">
                            <?php foreach ($users as $us_update) { ?>
                                <input type="hidden" name="id" value="<?php echo $us_update[0]; ?>">
                                <div class="form-group">
                                    <label for="exampleInputName1">UserName</label>
                                    <input type="text" class="form-control" id="exampleInputName1" value="<?php echo $us_update[1] ?>" name="user_update" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword4" value="<?php echo $us_update[2] ?>" name="pass_update" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Full Name</label>
                                    <input type="text" class="form-control" id="exampleInputName1" value="<?php echo $us_update[3] ?>" name="fullname_update" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPhone1">Phone Number</label>
                                    <input type="text" class="form-control" id="exampleInputPhone1" value="<?php echo $us_update[4] ?>" name="phone_update" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputAddress1">Address</label>
                                    <input type="text" class="form-control" id="exampleInputAddress1" value="<?php echo $us_update[5] ?>" name="address_update" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail3" value="<?php echo $us_update[6] ?>" required name="email_update" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBirthaday">Date of Birth</label>
                                    <input class="form-control" value="<?php echo $us_update[7] ?>" name="date_update" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Role Name</label>
                                    <input type="text" class="form-control" id="exampleInputName1" value="<?php echo $us_update[8] ?>" name="role_update" required>
                                </div>
                                <div class="form-group">
                                    <label>UserImage</label>
                                    <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled value="<?php echo $us_update[9] ?>" name="userimg_update">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Cập Nhật</button>
                                <button class="btn btn-light">Cancel</button>
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