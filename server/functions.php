<?php
require_once "dbConnection.php";
function getUsers(){
    global $conn;
    $sql = "SELECT `uid`, `name` , `mobile`, `email`, `password`,`role` FROM users";
    $result = $conn->query($sql);
    
    return $result;
}


?>