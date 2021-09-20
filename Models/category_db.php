<?php
require("connectDb.php");
function getAllCategory()
{
    global $db;
    $categories = $db->query("select * from Categories");
    return $categories;
}

function getCategory($id)
{
    global $db;
    $category = $db->query("select * from Categories where Id = $id");
    return $category;
}

function insertCategory($cateName,$cateDes)
{
    global $db;
    $query_insert = "INSERT INTO `categories`
    (`Name`,`Description`) VALUES ('$cateName','$cateDes')";
    $insert_count = $db->exec($query_insert);
    return $insert_count;
}

function updateCategory($id, $name_update, $des_update)
{
    global $db;
    $query_update = "UPDATE `categories`
    SET `Name` = '$name_update' ,`Description` = '$des_update'
    WHERE `Id` = $id";
    $update_count = $db->exec($query_update);
    return $update_count;
}

function deleteCategory($id)
{
    global $db;
    $query_del = "DELETE FROM `categories`
    WHERE `Id` = $id";
    $dele_count = $db->exec($query_del);
    return $dele_count;
}