<?php 
session_start();
if(isset($_SESSION['uid'])){
    require_once "./dbConnection.php";
    $uid = $_GET['id'];
    require_once "../server/functions.php";
    $accessMap = getScope();
    if(!in_array("admin/users.php?delete",$accessMap[$_SESSION['role']])){
     echo "access denied"; exit;   
    }
    
    $sql = "DELETE FROM `users` WHERE `uid` = $uid";
    
    //  echo $sql;exit;
    $query = mysqli_query($conn, $sql);
    
    echo mysqli_error($conn);
    if(mysqli_affected_rows($conn) > 0){
        echo "user deleted";
    }
    header("Location: ../admin/users.php");

}else{
    echo "user is not loged in";
}
 ?>