<?php
require('checkUser.php');
include '../../Models/user_Db.php';
if (!isset($_GET['type'])) {
    header('Location: ../Views/User');
} else if (isset($_GET['type']) && $_GET['type'] == 'them') {
    if ($_POST['user'] !== '' && $_POST['pass'] !== '') {
        $path = "../../assets/avartar/";
        $filename = $_FILES['img']['name'];
        $path = $path . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'],$path);
        $count = insertUser($_POST['user'], $_POST['pass'],$_POST['fullname'],$_POST['phone'],$_POST['address'],$_POST['email'],$_POST['date'],$_POST['role'],$path);
        if ($count > 0) {
            $message = "Create Successful";
            header("Location: ../views/user?mes=$message");
        } else {
            header('Location: ../views/user/create.php');
        }
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'sua') {
    $id_update = $_POST['id'];
    $user_update = $_POST['user_update'];
    $pass_update = $_POST['pass_update'];
    $fullname_update = $_POST['fullname_update'];
    $phone_update = $_POST['phone_update'];
    $addr_update = $_POST['address_update'];
    $email_update = $_POST['email_update'];
    $birthday_update = $_POST['date_update'];
    $role_update = $_POST['role_update'];
    $img_update = $_POST['userimg_update'];
    $update_count = updateUser($id_update,$user_update,$pass_update,$fullname_update,$phone_update,$addr_update,$email_update,$birthday_update,$role_update,$img_update);
    if ($update_count > 0) {
        $message = "Update Successful";
        header("Location: ../views/user?mes=$message");
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'xoa') {
    $id = $_GET['id'];
    $dele_count = deleteUser($id);
    if ($dele_count > 0) {
        $message = "Delete Successful";
        header("Location: ../views/user?mes=$message");
    }
}
