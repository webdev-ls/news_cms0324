<?php
// echo $_SERVER['HTTP_AUTHORIZATION'];
echo explode(" ",$_SERVER['HTTP_AUTHORIZATION'])[1];
// print_r($_SERVER); exit;


?>