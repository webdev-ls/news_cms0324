<?php
require_once "./dbConnection.php";
// print_r($_REQUEST);

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";

// echo $sql;

$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) > 0){
    $data = mysqli_fetch_assoc($query);
    // print_r(($data));

    if($data['password'] === $password){
        session_start();
        $_SESSION['uid'] = $data['uid'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['mobile'] = $data['mobile'];
        $_SESSION['role'] = $data['role'];
        header('Location: ../admin/post.php');
        exit;
    }else{
        header('Location: ../admin?m=wrongpassword');
        exit;
    }
}
// exit;
header('Location: ../admin?m=usernotfound');


?>