<?php

echo "<link rel='stylesheet' href='/css/style.css'>";
header("content-type:text/html;charset:utf-8");

$host = "localhost";
$user = "root";
$password = "1qaz@wsx";
$db = "class";

$conn = mysqli_connect($host, $user, $password) or die("連線失敗");

if ($conn) {
    mysqli_select_db($conn, $db);

    mysqli_query($conn, "set names utf8");

    mysqli_query($conn, "set character_set_client=utf8");

    mysqli_query($conn, "set character_set_results=utf8");

}
