<?php 
 echo "<pre>";
//  print_r($_POST);

 echo htmlspecialchars($_POST['name']);

 require_once "./dbConnection.php";
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$role = mysqli_real_escape_string($conn, $_POST['role']);
 $sql = "INSERT INTO `users` (`name`, `mobile`, `email`, `password`, `role`) VALUES ('$name','$mobile','$email','$password','$role')";

//  echo $sql;
 $query = mysqli_query($conn, $sql);
 if(mysqli_affected_rows($conn) > 0){
    echo "user inserted";
 }

 ?>