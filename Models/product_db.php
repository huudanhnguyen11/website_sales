<?php
require("connectDb.php");

function getAllProductByCategoryId($cateId)
{
    global $db;
    $products = $db->query("select p.Id as ProductId, c.Id as CategoryId, b.Id as BrandId,p.ProductName,c.Name as CategoryName,
    b.BrandName,p.Price,p.Dicount,p.ProductImage,p.Description
    from products as p
    inner join categories as c on p.CategoryId = c.Id
    inner join brands as b on p.BrandId = b.Id
    where c.Id = $cateId");
    return $products;
}

function getAllProduct()
{
    global $db;
    $products = $db->query("select p.Id as ProductId, c.Id as CategoryId, b.Id as BrandId,p.ProductName,c.Name as CategoryName,
    b.BrandName,p.Price,p.Dicount,p.ProductImage,p.Description
    from products as p
    inner join categories as c on p.CategoryId = c.Id
    inner join brands as b on p.BrandId = b.Id");
    return $products;
}
function getProduct($id)
{
    global $db;
    $product = $db->query("select p.Id as ProductId, c.Id as CategoryId, b.Id as BrandId,p.ProductName,c.Name as CategoryName,
    b.BrandName,p.Price,p.Dicount,p.ProductImage,p.Description
    from products as p
    inner join categories as c on p.CategoryId = c.Id
    inner join brands as b on p.BrandId = b.Id where p.Id = $id");
    return $product;
}
function insertProduct($product_name,$product_price,$product_discount,$products_img,$product_brandId,$product_categoryId,$product_des)
{
    global $db;
    $query_insert = "INSERT INTO `products`
    (`ProductName`,`Price`,`Dicount`,`ProductImage`,`BrandId`,`CategoryId`,`Description`) 
    VALUES ('$product_name','$product_price','$product_discount','$products_img',$product_brandId,$product_categoryId,'$product_des')";
    $insert_count = $db->exec($query_insert);
    return $insert_count;
}

function updateProduct($id,$product_name,$product_price,$product_discount,$products_img,$product_brandId,$product_categoryId,$product_des)
{
    global $db;
    $query_update = "UPDATE `products`
    SET `ProductName` = '$product_name' ,`Price` = '$product_price' ,`Dicount` = '$product_discount',`ProductImage` = '$products_img',`BrandId` = '$product_brandId',`CategoryId` = '$product_categoryId',`Description` = '$product_des'
    WHERE `Id` = $id";
    $update_count = $db->exec($query_update);
    return $update_count;
}

function deleteProduct($id)
{
    global $db;
    $query_del = "DELETE FROM `products`
    WHERE `Id` = $id";
    $dele_count = $db->exec($query_del);
    return $dele_count;
}