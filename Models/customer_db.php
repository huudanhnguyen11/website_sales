<?php
require("connectDb.php");
function getAllCustomers()
{
    global $db;
    $customers = $db->query("select * from customers");
    return $customers;
}

function getCustomer($id)
{
    global $db;
    $customer = $db->query("select * from customers where Id = $id");
    return $customer;
}
function getCustomerByPhone($phone)
{
    global $db;
    $customer = $db->query("select * from customers where Id = '$phone'");
    return $customer;
}
function insertCustomer($Cus_Name,$Cus_Phone,$Cus_Add,$Cus_Email,$Cus_Des)
{
    global $db;
    $insert_Id = 0;
    $query_insert = "INSERT INTO `customers`
    (`CustomerName`,`PhoneNumber`,`Address`,`Email`,`Description`) VALUES ('$Cus_Name','$Cus_Phone','$Cus_Add','$Cus_Email','$Cus_Des')";
    $insert_count = $db->exec($query_insert);
    if($insert_count > 0){
        $insert_Id = $db->lastInsertId();
    }
    return $insert_Id;
}

function updateCustomer($id,$Cus_Name,$Cus_Phone,$Cus_Add,$Cus_Email,$Cus_Des)
{
    global $db;
    $query_update = "UPDATE `customers`
    SET `CustomerName` = '$Cus_Name' ,`PhoneNumber` = '$Cus_Phone' ,`Address` = '$Cus_Add',`Email` = '$Cus_Email',`Description` = '$Cus_Des'
    WHERE `Id` = $id";
    $update_count = $db->exec($query_update);
    return $update_count;
}

function deleteCustomer($id)
{
    global $db;
    $query_del = "DELETE FROM `customers`
    WHERE `Id` = $id";
    $dele_count = $db->exec($query_del);
    return $dele_count;
}