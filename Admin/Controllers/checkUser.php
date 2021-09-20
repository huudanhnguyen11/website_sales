<?php
session_start();
if(!isset($_SESSION['account']) && $_SESSION['account'] == null){
    $url = $_SERVER['REQUEST_URI'];
    if(str_contains($url, 'controllers')){
        header('Location: ../Views/Account');
    } else {
        header('Location: ../Account');
    }
}
?>