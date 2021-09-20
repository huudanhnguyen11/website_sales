<?php
$dsn = "mysql:host=localhost;dbname=technology_sales_web";
$username = "root";
$password = "";

// tao doi tuong pdo
try {
$db = new PDO($dsn,$username,$password);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}