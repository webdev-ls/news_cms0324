<?php
require_once "dbConnection.php";
function getUsers($limit, $offset) {
    global $conn;
    $sql = "SELECT `uid`, `name` , `mobile`, `email`, `password`,`role` FROM users LIMIT  $limit OFFSET $offset";
    $result = $conn->query($sql);
    
    return $result;
}
function getTotalUsersCount() {
    global $conn;
    $sql = "SELECT COUNT(*) as totalUsers FROM users";
    $result = $conn->query($sql);
    $usersCount = mysqli_fetch_assoc($result);
    
    return $usersCount['totalUsers'];
}


?>