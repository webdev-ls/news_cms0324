<?php
echo "<prE>";
$request = file_get_contents("php://input");
$request =  json_decode($request,true);
// print_r($request); exit;

require_once "./dbConnection.php";
// print_r($_REQUEST);

$email = $request['email'];
$password = $request['password'];

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
        echo "Location: ../admin/post.php";
        // header('Location: ../admin/post.php');
        exit;
    }else{
        echo "Location: ../admin?m=wrongpassword";
        // header('Location: ../admin?m=wrongpassword');
        exit;
    }
}
echo "Location: ../admin?m=usernotfound";
// exit;
// header('Location: ../admin?m=usernotfound');


?>