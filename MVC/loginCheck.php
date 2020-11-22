<?php
session_start();
require("userModel.php");

$userName = $_POST['student_name'];
$passWord = $_POST['student_pwd'];

if (checkUserIDPwd($userName, $passWord)) {
    $_SESSION['uID']=checkUserIDPwd($userName, $passWord); //設為student name
	header("Location: student_table.php"); //登入直接前往已完成的工作頁面
} else { //帳密錯誤
    $_SESSION['uID']="";
    $error_msg= "帳號或密碼錯誤 請再試一次 <br />";
    header("Location: loginForm.php?error_msg=$error_msg");
}
?>
