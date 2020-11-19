<?php
session_start();
require("secretaryModel.php");
/*if (!isset($_SESSION['uID']) or $_SESSION['uID'] <= "") { //uID未定義(沒有登入) 或 內容為空
    header("Location: loginForm.php"); //要求登入
}
 if ($_SESSION['uID'] == 'student') { //設定權限
    $stuMode = 1; //是老闆
}
require("todoModel.php"); //引入model
if (isset($_GET['m'])) {
    $msg = "<font color='red'>" . $_GET['m'] . "</font>";
} else {
    $msg = "Good morning";
 }


$stuMode='student';*/
/*$secretaryMode='secretary';
$result = getJobList($secretaryMode); //取得工作清單
$jobStatus = array('未完成', '已完成', '已結案', '已取消');*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>secretary view</title>
</head>

<body>

    <p>my Todo List !! </p>
    <hr />
    <div><?php /*echo $msg;*/ ?></div>
    <hr>
    <a href="todoForm.php">login</a> | <a href="todoAddForm.php?id=-1">Add Task</a> <br>
    <table width="200" border="1">
        <tr>
            <td>id</td>
            <td>student_id</td>
            <td>student_mom</td>
            <td>student_dad</td>
            <td>money_type</td>
            <td>secretary_comment</td>
            <td>secretary_status</td>
            <td>secretary_result</td>
            <td>-</td>
        </tr>
<?php
//抓每筆資料
while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['id'] . "</td>";
    echo "<td>{$rs['student_id']}</td>";
	echo "<td>{$rs['student_mom']}</td>";
    echo "<td>{$rs['student_dad']}</td>";
    echo "<td>{$rs['money_type']}</td>";
    echo "<td>{$rs['secretary_comment']}</td>";
    echo "<td>{$rs['secretary_status']}</td>";
    echo "<td>{$rs['secretary_result']}</td>";
	echo "<td>" ;
	echo "<a href='Todoeditform.php?id={$rs['id']}'>Edit</a> ";
	echo "<a href='Todoset.php?id={$rs['id']}'>OK</a>" . "</td></tr>";

}
?>
    </table>
</body>

</html>