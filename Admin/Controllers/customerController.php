<?php
require('checkUser.php');
include '../../Models/customer_db.php';
if (!isset($_GET['type'])) {
    header('Location: ../Views/Customer');
} else if (isset($_GET['type']) && $_GET['type'] == 'them') {
    if ($_POST['name'] !== '') {
        $count = insertCustomer($_POST['name'], $_POST['phone'],$_POST['address'],$_POST['email'],$_POST['des']);
        if ($count > 0) {
            $message = "Create Successful";
            header("Location: ../views/customer?mes=$message");
        } else {
            header('Location: ../views/customer/create.php');
        }
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'sua') {
    $id_update = $_POST['id'];
    $name_update = $_POST['name_update'];
    $phone_update = $_POST['phone_update'];
    $address_update = $_POST['address_update'];
    $email_update = $_POST['email_update'];
    $des_update = $_POST['des_update'];
    $update_count = updateCustomer($id_update, $name_update,$phone_update, $address_update,$email_update,$des_update);
    if ($update_count > 0) {
        $message = "Update Successful";
        header("Location: ../views/customer?mes=$message");
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'xoa') {
    $id = $_GET['id'];
    $dele_count = deleteCustomer($id);
    if ($dele_count > 0) {
        $message = "Delete Successful";
        header("Location: ../views/customer?mes=$message");
    }
}
