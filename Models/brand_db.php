<?php
require("connectDb.php");
function getAllBrands()
{
    global $db;
    $brands = $db->query("select * from brands");
    return $brands;
}

function getBrand($id)
{
    global $db;
    $brand = $db->query("select * from brands where Id = $id");
    return $brand;
}

function insertBrand($brand_Name,$brand_Des)
{
    global $db;
    $query_insert = "INSERT INTO `brands`
    (`BrandName`,`Description`) VALUES ('$brand_Name','$brand_Des')";
    $insert_count = $db->exec($query_insert);
    return $insert_count;

}

function updateBrand($id, $name_update, $des_update)
{
    global $db;
    $query_update = "UPDATE `brands`
    SET `BrandName` = '$name_update' ,`Description` = '$des_update'
    WHERE `Id` = $id";
    $update_count = $db->exec($query_update);
    return $update_count;

}

function deleteBrand($id)
{
    global $db;
    $query_del = "DELETE FROM `brands`
    WHERE `Id` = $id";
    $dele_count = $db->exec($query_del);
    return $dele_count;
}