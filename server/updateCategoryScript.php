<?php 
require_once "./dbConnection.php";
session_start();
require_once "../server/functions.php";
$accessMap = getScope();
if(!in_array("admin/users.php?edit",$accessMap[$_SESSION['role']])){
 echo "access denied"; exit;   
}
//pending
$uid = mysqli_real_escape_string($conn, $_POST['category_id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$role = mysqli_real_escape_string($conn, $_POST['role']);
 $sql = "UPDATE `users` SET `name` = '$name', `email` = '$email', `mobile` = '$mobile', `password` = '$password', `role` = '$role' WHERE uid = $uid";

//  echo $sql;exit;
 $query = mysqli_query($conn, $sql);

 echo mysqli_error($conn);
 if(mysqli_affected_rows($conn) > 0){
    echo "user updated";
 }
header("Location: ../admin/users.php");
 ?>