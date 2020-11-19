<?php
session_start();
require("userModel.php");

$userName = $_POST['student_name'];
$passWord = $_POST['student_pwd'];
$student_id = $_POST['stuID'];

if (checkUserIDPwd($userName, $passWord)) {
    $_SESSION['uID']=$userName;
    $_SESSION['stuID']=$student_id;
	header("Location: student_table.php"); //登入直接前往已完成的工作頁面
} else { //帳密錯誤
    $_SESSION['uID']="";
    header("Location: loginForm.php");
	echo "Invalid Username or Password - Please try again <br />";
}
?>
