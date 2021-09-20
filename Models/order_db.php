<?php
require("connectDb.php");
function getAllOrdersbyCustomer()
{
    global $db;
    $orders = $db->query("select o.Id as OrderId, cus.Id as CustomerId,cus.CustomerName,o.CreatedDate,o.StatusOrder,o.ShippingAddress,o.ShippingCity,o.PaymentType,o.ShippingType from orders as o
    inner join customers as cus on o.CustomerId = cus.Id;");
    return $orders;
}

function getOrderbyCustomer($id)
{
    global $db;
    $order = $db->query("select o.Id as OrderId, cus.Id as CustomerId,cus.CustomerName,o.CreatedDate,o.StatusOrder,o.ShippingAddress,o.ShippingCity,o.PaymentType,o.ShippingType from orders as o
    inner join customers as cus on o.CustomerId = cus.Id where o.Id = $id");
    return $order;
}

function insertOrder($O_ShipAddress, $O_ShipCity, $O_Payment, $O_CusId, $O_ShipType)
{
    global $db;
    $orderId = 0;
    $dateNow = date('Y-m-d');
    $query_insert = "INSERT INTO `orders`
    (`CreatedDate`,`StatusOrder`,`ShippingAddress`,`ShippingCity`,`PaymentType`,`CustomerId`,`ShippingType`) VALUES ('$dateNow','Đang xử lý','$O_ShipAddress','$O_ShipCity','$O_Payment',$O_CusId,'$O_ShipType')";
    $insert_count = $db->exec($query_insert);
    if($insert_count > 0){
        $orderId = $db->lastInsertId();
    }
    return $orderId;
}

function updateOrder($id, $O_CreateDate, $O_Status, $O_ShipAddress, $O_ShipCity, $O_Payment, $O_CusId, $O_UserId)
{
    global $db;
    $query_update = "UPDATE `orders`
    SET `CreatedDate` = '$O_CreateDate' ,`StatusOrder` = '$O_Status' ,`ShippingAddress` = '$O_ShipAddress',`ShippingCity` = '$O_ShipCity',`PaymentType` = '$O_Payment',`CustomerId` = '$O_CusId',`UserId` = '$O_UserId'
    WHERE `Id` = $id";
    $update_count = $db->exec($query_update);
    return $update_count;
}

function deleteOrder($id)
{
    global $db;
    $query_del = "DELETE FROM `orders`
    WHERE `Id` = $id";
    $dele_count = $db->exec($query_del);
    return $dele_count;
}
