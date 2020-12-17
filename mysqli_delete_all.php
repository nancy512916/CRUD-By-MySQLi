<?php
require_once "connDB.php";

// var_dump($_POST['del']);

$del = $_POST['del'];

foreach ($del as $value) {
    mysqli_query($conn, "DELETE FROM `student` WHERE `cID`=" . $value);
}

header("location:mysqli_read.php");
