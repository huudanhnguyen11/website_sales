<?php
require('checkUser.php');
include '../../Models/category_db.php';
if (!isset($_GET['type'])) {
    header('Location: ../Views/Category');
} else if (isset($_GET['type']) && $_GET['type'] == 'them') {
    if ($_POST['name'] !== '') {
        $count = insertCategory($_POST['name'], $_POST['description']);
        if ($count > 0) {
            $message = "Create Successful";
            header("Location: ../views/category?mes=$message");
        } else {
            header('Location: ../views/category/create.php');
        }
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'sua') {
    $id_update = $_POST['id'];
    $name_update = $_POST['name_update'];
    $des_update = $_POST['description_update'];
    $update_count = updateCategory($id_update, $name_update, $des_update);
    if ($update_count > 0) {
        $message = "Update Successful";
        header("Location: ../views/category?mes=$message");
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'xoa') {
    $id = $_GET['id'];
    $dele_count = deleteCategory($id);
    if ($dele_count > 0) {
        $message = "Delete Successful";
        header("Location: ../views/category?mes=$message");
    }
}
