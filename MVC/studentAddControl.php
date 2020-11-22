<?php
session_start();
require("dbconnect.php");
require("studentModel.php");
// if (! isset($_SESSION['uID']) or $_SESSION['uID'] <= "") { //uID未定義(沒有登入) 或 內容為空
// 	header("Location: loginForm.php"); //要求登入
// }
$student_id=mysqli_real_escape_string($conn,$_POST['student_id']);

$mom=mysqli_real_escape_string($conn,$_POST['mom']);
$dad=mysqli_real_escape_string($conn,$_POST['dad']);
$money_type=mysqli_real_escape_string($conn,$_POST['money_type']);
studentAdd($student_id,$mom,$dad,$money_type);
$msg="新增成功";
header("Location: student_table.php?m=$msg");
?>
