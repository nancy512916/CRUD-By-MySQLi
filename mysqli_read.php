<?php
echo "<script>
function delall(){
    if(confirm('是否要刪除所選資料？')){
        form1.submit();
    }
    return false;
};

</script>";

echo "<link
            rel='stylesheet'
            href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
            integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
            crossorigin='anonymous'
        />";

require_once "connDB.php";

$sql = "SELECT * FROM `student` WHERE 1";
$result = mysqli_query($conn, $sql);
//總筆數
$record = mysqli_num_rows($result);
//每頁顯示筆數
$per_page = 5;
//共幾頁
$total_page = ceil($record / $per_page);

//取得當前頁數
if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}

$start = ($page - 1) * $per_page;
$sql = "SELECT * FROM `student` WHERE 1 LIMIT {$start},{$per_page}";
$result = mysqli_query($conn, $sql);

echo "<form align='center'  action='mysqli_delete_all.php' name='form1'  method='POST'>";
echo "<h1>會員管理系統</h1>";
echo "<p>總共{$record}筆資料 目前在第{$page}頁</p>";
echo "<p><a href='mysqli_create.php'>新增學生資料</a>&emsp;<a href='#' onclick=delall()>刪除選取資料</a></p>";
echo "<table border='1' align='center' cellpadding='4' style='border-collapse:collapse'>";
echo "<tr align='center'>
        <td>學號</td>
        <td>姓名</td>
        <td>性別</td>
        <td>生日</td>
        <td>電子郵件</td>
        <td>電話</td>
        <td>地址</td>
        <td>身高</td>
        <td>體重</td>
        <td colspan=2>功能</td>
     </tr>";

// $sql = "SELECT * FROM `student` WHERE 1";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";
        echo "<td>{$row['cID']}</td>";
        echo "<td>{$row['cName']}</td>";
        echo "<td>{$row['cSex']}</td>";
        echo "<td>{$row['cBirthday']}</td>";
        echo "<td>{$row['cEmail']}</td>";
        echo "<td>{$row['cPhone']}</td>";
        echo "<td>{$row['cAddr']}</td>";
        echo "<td>{$row['cHeight']}</td>";
        echo "<td>{$row['cWeight']}</td>";
        echo "<td><a href='mysqli_update.php?cID={$row['cID']}'>修改</a>&nbsp;<a href='mysqli_delete.php?cID={$row['cID']}'>刪除</a><input type='checkbox' name=del[] value={$row['cID']}></td>";
        echo "</tr>";

    }
}
;
$page1 = $page - 1;
$page2 = $page + 1;

echo "<table align='center'>";
echo "<ul class='pagination justify-content-center mt-4'";
if ($page > 1) {
    echo "<li class='page-item'><a href='?page=1' class='page-link'>首頁</a></li>
         &emsp;<li class='page-item'><a href='?page=$page1' class='page-link'>上一頁</a></li>";
}
if ($page < $total_page) {
    echo "&emsp;<li class='page-item'><a href='?page=$page2' class='page-link'>下一頁</a></li>
         &emsp;<li class='page-item'><a href='?page=$total_page' class='page-link'>末頁</a></li>";}
echo "</ul>";
echo "</table>";

echo "</table>";
echo "</form>";

mysqli_free_result($result);
mysqli_close($conn);
