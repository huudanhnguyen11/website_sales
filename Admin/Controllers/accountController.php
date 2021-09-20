<?php
include '../../Models/user_Db.php';
session_start();
if(isset($_SESSION['account']) && isset($_GET['logout']) == 'ok'){
    session_destroy();
}
if (!isset($_POST['username']) && !isset($_POST['password'])) {
    header('Location: ../Views/Account');
} else {
    $message = '';
    $user = checkLogin($_POST['username']);
    if ($user != null) {
        if ($_POST['password'] != $user['Password']) {
            $message = 'Sai mật khẩu';
            header("Location: ../Views/Account/index.php?mes=$message");
        } else {
            
            $_SESSION['account'] = $user;
            if ($user['RoleName'] == 'Admin') {
                header('Location: ../Views/Dashboard');
            } elseif ($user['RoleName'] == 'Sales') {
                header('Location: ../Views/Order');
            }
        }
    } else {
        $message = 'Tài khoản không tồn tại';
        header("Location: ../Views/Account/index.php?mes=$message");
    }
}
