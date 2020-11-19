<?php
session_start();
if (!isset($_SESSION['uID']) or $_SESSION['uID'] <= "") { //uID未定義(沒有登入) 或 內容為空
    header("Location: loginForm.php"); //要求登入
}
// if ($_SESSION['uID'] == 'student') { //設定權限
//     $stuMode = 1; //是老闆
// }
require("todoModel.php"); //引入model
// if (isset($_GET['m'])) {
//     $msg = "<font color='red'>" . $_GET['m'] . "</font>";
// } else {
//     $msg = "Good morning";
// }


$stuMode='student';
$result = getJobList($stuMode); //取得工作清單
$status=getStatusList($stuMode,$_SESSION['stuID']);
// $jobStatus = array('未完成', '已完成', '已結案', '已取消');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>無標題文件</title>
</head>

<body>

    <p>my Todo List !! </p>
    <hr />
    <hr>
    <a href="student_form.php?id=-1">Add Task</a> <br>
    <table width="200" border="1">
        <tr>
            <td>id</td>
            <td>mom</td>
            <td>dad</td>
            <td>type</td>
            <td>teacher status</td>
            <td>secretary status</td>
            <td>principle status</td>
        </tr>
        <?php

        while ($rs = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $rs['student_id'] . "</td>";
            echo "<td>", htmlspecialchars($rs['student_mom']), "</td>";
            echo "<td>", htmlspecialchars($rs['student_dad']), "</td>";
            echo "<td>", htmlspecialchars($rs['money_type']), "</td>";
            echo "</td></tr>";
        }
        ?>
    </table>
</body>

</html>