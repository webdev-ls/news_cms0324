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

function getCategories($limit, $offset) {
    global $conn;
    $sql = "SELECT * FROM categories LIMIT  $limit OFFSET $offset";
    $result = $conn->query($sql);
    
    return $result;
}
function getCategoriesCount() {
    global $conn;
    $sql = "SELECT COUNT(*) as totalCategories FROM categories";
    $result = $conn->query($sql);
    $usersCount = mysqli_fetch_assoc($result);
    return $usersCount['totalCategories'];
}
function getUser($uid) {
    global $conn;
    $sql = "SELECT `uid`, `name` , `email`, `password`,`role` FROM users WHERE uid = '$uid'";
    $result = $conn->query($sql);
    return $result;
}
function getCategory($uid) {
    global $conn;
    $sql = "SELECT * FROM categories WHERE category_id = '$uid'";
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
            "admin/add-user.php",
            "admin/category.php",
            "admin/category.php?edit",
            "admin/category.php?delete",
            "admin/update-category.php?id",
            
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