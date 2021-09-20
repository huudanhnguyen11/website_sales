<?php
require("connectDb.php");
function checkLogin($username){
    global $db;
    $user = $db->query("select * from Users where UserName='$username'")->fetch();
    return $user;
}
function getAllUser()
{
    global $db;
    $users = $db->query("select * from users");
    return $users;
}

function getUser($id)
{
    global $db;
    $user = $db->query("select * from users where Id = $id");
    return $user;
}

function insertUser($user, $pass,$fullname,$phone,$address,$email,$birthday,$rolename,$userimage)
{
    global $db;
    $query_insert = "INSERT INTO `users`
    (`UserName`,`Password`,`FullName`,`Phone`,`Address`,`Email`,`Birthday`,`RoleName`,`UserImage`) VALUES ('$user','$pass','$fullname','$phone','$address','$email','$birthday','$rolename','$userimage')";
    $insert_count = $db->exec($query_insert);
    return $insert_count;
}
function updateUser($id,$user, $pass,$fullname,$phone,$address,$email,$birthday,$rolename,$userimage)
{
    global $db;
    $query_update = "UPDATE `users`
    SET `UserName` = '$user' ,`Password` = '$pass' ,`FullName` = '$fullname',`Phone` = '$phone',`Address` = '$address',`Email` = '$email',`Birthday` = '$birthday',`RoleName` = '$rolename',`UserImage` = '$userimage'
    WHERE `Id` = $id";
    $update_count = $db->exec($query_update);
    return $update_count;
}

function deleteUser($id)
{
    global $db;
    $query_del = "DELETE FROM `users`
    WHERE `Id` = $id";
    $dele_count = $db->exec($query_del);
    return $dele_count;
}