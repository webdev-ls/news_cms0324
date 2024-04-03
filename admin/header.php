<?php 
session_start();

$accessMap = [
    "admin" => [],
    "user" => [
        "admin/post.php",
        "admin/post.php?edit",
        "admin/post.php?update",
        // "admin/post.php?delete",
        // "admin/users.php",
    ]
];
// echo $_SERVER['REQUEST_URI']; exit;
$string = trim($_SERVER['REQUEST_URI'],"/");
// echo substr($string,0,strpos($string,"="));
// echo "<br>";
// echo "<pre>";
// print_r();
// echo "<br>";
// echo "<br>";
// echo "<br>";

// print_r($accessMap[$_SESSION['role']]); echo explode("=", $string)[0]; exit;
if(!isset($_SESSION['uid'])){
    header('Location: ./index.php');
}else if(!in_array(explode("=", $string)[0],$accessMap[$_SESSION['role']])){
    echo "Access Denied"; exit;
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="post.php"><img class="logo" src="images/news.jpg"></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-9  col-md-1">
                        <a href="../server/logoutScript.php" class="admin-logout" >logout <?=$_SESSION['role']?></a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="post.php">Post</a>
                            </li>
                            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){ ?>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
