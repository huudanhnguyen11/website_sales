<?php
require('checkUser.php');
include '../../Models/product_db.php';
if (!isset($_GET['type'])) {
    header('Location: ../Views/Product');
} else if (isset($_GET['type']) && $_GET['type'] == 'them') {
    if ($_POST['productname'] !== '' && $_FILES['img']['tmp_name'] != null) {
        $path = "../Assets/img/";
        $filename = $_FILES['img']['name'];
        $path = $path . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'],$path);
        $count = insertProduct($_POST['productname'], $_POST['price'],$_POST['discount'],$path,$_POST['brandid'],$_POST['categoryid'],$_POST['des']);
        if ($count > 0) {
            $message = "Create Successful";
            header("Location: ../views/product?mes=$message");
        } else {
            header('Location: ../views/product/create.php');
        }
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'sua') {
    $id_update = $_POST['id'];
    $productname_update = $_POST['productname_update'];
    $price_update = $_POST['price_update'];
    $discount_update = $_POST['discount_update'];
    $img_update = $_POST['img_update'];
    $brandid_update = $_POST['brandid_update'];
    $categoryid_update = $_POST['categoryid_update'];
    $des_update = $_POST['des_update'];
    $update_count = updateProduct($id_update,$productname_update,$price_update,$discount_update,$img_update,$brandid_update,$categoryid_update,$des_update);
    if ($update_count > 0) {
        $message = "Update Successful";
        header("Location: ../views/product?mes=$message");
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'xoa') {
    $id = $_GET['id'];
    $dele_count = deleteProduct($id);
    if ($dele_count > 0) {
        $message = "Delete Successful";
        header("Location: ../views/product?mes=$message");
    }
}