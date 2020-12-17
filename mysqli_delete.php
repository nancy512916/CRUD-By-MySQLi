<?php
require_once "connDB.php";

if (isset($_POST['action']) && isset($_POST['action']) == "delete") {
    $sql = "DELETE FROM `student` WHERE `cID`={$_POST['cID']}";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("location:mysqli_read.php");

}
$sql = "SELECT * FROM `student` WHERE `cID`={$_GET['cID']}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center">會員管理系統 - 刪除資料</h1>
    <p align="center"><a href="mysqli_read.php">回主畫面</a></p>
    <form method="POST" onsubmit="return confirm('是否要刪除該筆資料？')">
        <table align="center" border="1" style="border-collapse: collapse;" cellpadding=4>
            <tr><th>欄位</th><th>資料</th></tr>
            <tr><td>姓名</td>
                <td><input type="text" name="cName" value="<?=$row['cName']?>"/></td></tr>
            <tr><td>性別</td>
                <td><input type="radio" name="cSex" value="M"  <?php if ($row['cSex'] == 'M') {
    echo "checked";
}

?>/>男生
                    <input type="radio" name="cSex" value="F" <?php if ($row['cSex'] == 'F') {
    echo "checked";
}

?>/>女生
                </td>
            </tr>
            <tr><td>生日</td>
                <td><input type="date" name="cBirthday" value="<?=$row['cBirthday']?>"/></td></tr>
            <tr><td>電子郵件</td>
                <td><input type="email" name="cEmail" value="<?=$row['cEmail']?>"/></td></tr>
            <tr><td>電話</td>
                <td><input type="tel" name="cPhone" value="<?=$row['cPhone']?>"/></td></tr>
            <tr><td>地址</td>
                <td><input type="text" name="cAddr" value="<?=$row['cAddr']?>"/></td></tr>
            <tr><td>身高</td>
                <td><input type="number" name="cHeight" value="<?=$row['cHeight']?>"/></td></tr>
            <tr><td>體重</td>
                <td><input type="number" name="cWeight" value="<?=$row['cWeight']?>"/></td></tr>
            </tr>
            <tr>
                <td colspan="2" align="center">
                 <input type="hidden" name="cID" value="<?=$row['cID']?>">
                 <input type="hidden" name="action" value="delete">
                 <input type="submit" value="刪除資料">&emsp;<input type="reset" value="取消">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
