<?php
require_once "dbConnection.php";
function getUsers($limit, $offset) {
    global $conn;
    $sql = "SELECT `uid`, `name` , `email`, `password`,`role` FROM users LIMIT  $limit OFFSET $offset";
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
function getUser($uid) {
    global $conn;
    $sql = "SELECT `uid`, `name` , `email`, `password`,`role` FROM users WHERE uid = '$uid'";
    $result = $conn->query($sql);
    return $result;
}

function getScope() {
    return [
        "admin" => [
            "admin/post.php",
            "admin/post.php?edit",
            "admin/post.php?update",
            "admin/users.php",
            "admin/users.php?edit",
            "admin/users.php?delete",
            "admin/users.php?page",
            "admin/update-user.php",
            "admin/update-user.php?id",
            "admin/add-user.php"
        ],
        "user" => [
            "admin/post.php",
            "admin/post.php?edit",
            "admin/post.php?update",
            // "admin/post.php?delete",
            // "admin/users.php",
        ]
    ];
}


?>