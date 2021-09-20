<?php
require('checkUser.php');
include '../../Models/product_db.php';
if (!isset($_GET['type'])) {
    header('Location: ../Views/Product');
} else if (isset($_GET['type']) && $_GET['type'] == 'them') {
    if ($_POST['customerId'] !== '') {
        $count = insertOrder(date("Y-m-d"),$_POST['statusorder'],$_POST['shippingaddress'],$_POST['shippingcity'],$_POST['statuspayment'],$_POST['CustomerId'],$_POST['']);
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
        header("Location: ../views/order?mes=$message");
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'xoa') {
    $id = $_GET['id'];
    $dele_count = deleteOrder($id);
    if ($dele_count > 0) {
        $message = "Delete Successful";
        header("Location: ../views/order?mes=$message");
    }
}