<?php
session_start();
require("userModel.php");

$userName = $_POST['id'];
$passWord = $_POST['pwd'];

if (checkUserIDPwd($userName, $passWord)) {
    $_SESSION['uID']=$userName;
	header("Location: todoListView.php"); //登入直接前往已完成的工作頁面
} else { //帳密錯誤
    $_SESSION['uID']="";
    header("Location: loginForm.php");
	// echo "Invalid Username or Password - Please try again <br />";
}
?>
