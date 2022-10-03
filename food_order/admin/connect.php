<?php
    session_start();
    
    define('SITEURL', 'http://localhost/food_order/');
    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'food_order';

    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
?>