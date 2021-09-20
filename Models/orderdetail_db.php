<?php
require("connectDb.php");
function getAllOrderdetails()
{
    global $db;
    $orderdetails = $db->query("select * from orderdetails as od
    inner join orders as o on od.OrderId = o.Id
    inner join products as p on od.ProductId = p.Id");
    return $orderdetails;
}

function getOrderdetails($id)
{
    global $db;
    $orderdetails_id = $db->query("select * from orderdetails where OrderId = $id");
    return $orderdetails_id;
}

function insertOrderdetails($Order_Id,$Product_Id,$Quantity)
{
    global $db;
    $query_insert = "INSERT INTO `orderdetails`
    (`OrderId`,`ProductId`,`Quantity`) VALUES ($Order_Id,$Product_Id,$Quantity)";
    $insert_count = $db->exec($query_insert);
    return $insert_count;
}

function updateOrderdetails($id,$Order_Id,$Product_Id,$Quantity)
{
    global $db;
    $query_update = "UPDATE `orderdetails`
    SET `OrderId` = '$Order_Id' ,`ProductId` = '$Product_Id' ,`Quantity` = '$Quantity'
    WHERE `Id` = $id";
    $update_count = $db->exec($query_update);
    return $update_count;
}

function deleteOrderdetails($id)
{
    global $db;
    $query_del = "DELETE FROM `orderdetails`
    WHERE `Id` = $id";
    $dele_count = $db->exec($query_del);
    return $dele_count;
}