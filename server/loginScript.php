<?php

// 3 methods

// 1. MYSQLI
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_NAME","news_cms");
define("DB_PASS","root");


// echo DB_HOST;

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(mysqli_connect_error()){
    die("Connect ERROR". mysqli_connect_error());
}

echo "Connected";

echo "<pre>";
// var_dump(mysqli_connect_error());

// // print_r(($conn)); 



print_r($_REQUEST);

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";

echo $sql;

$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) > 0){
    $data = mysqli_fetch_assoc($query);
    print_r(($data));

    if($data['password'] === $password){
        // echo "dsvsdfb "; exit;
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