<?php

require_once "connDB.php";

if (isset($_POST['action']) && isset($_POST['action']) == "create") {
    $sql = "INSERT INTO `student` (`cName`,`cSex`,`cBirthday`,`cEmail`,`cPhone`,`cAddr`,`cHeight`,`cWeight`) VALUES ('{$_POST['cName']}','{$_POST['cSex']}','{$_POST['cBirthday']}','{$_POST['cEmail']}','{$_POST['cPhone']}','{$_POST['cAddr']}','{$_POST['cHeight']}','{$_POST['cWeight']}')";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("location:mysqli_read.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center">會員管理系統 - 新增資料</h1>
    <p align="center"><a href="mysqli_read.php">回主畫面</a></p>
    <form method="POST">
        <table align="center" border="1" style="border-collapse: collapse;" cellpadding=4>
            <tr><th>欄位</th><th>資料</th></tr>
            <tr><td>姓名</td>
                <td><input type="text" name="cName"/></td></tr>
            <tr><td>性別</td>
                <td><input type="radio" name="cSex" value="M"/>男生
                    <input type="radio" name="cSex" value="F"/>女生
                </td>
            </tr>
            <tr><td>生日</td>
                <td><input type="date" name="cBirthday"/></td></tr>
            <tr><td>電子郵件</td>
                <td><input type="email" name="cEmail"/></td></tr>
            <tr><td>電話</td>
                <td><input type="tel" name="cPhone"/></td></tr>
            <tr><td>地址</td>
                <td><input type="text" name="cAddr"/></td></tr>
            <tr><td>身高</td>
                <td><input type="number" name="cHeight"/></td></tr>
            <tr><td>體重</td>
                <td><input type="number" name="cWeight"/></td></tr>
            </tr>
            <tr>
                <td colspan="2" align="center">
                 <input type="hidden" name="action" value="create">
                 <input type="submit" value="送出資料">&emsp;<input type="reset" value="清除資料">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
