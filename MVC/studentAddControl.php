<?php
require("dbconnect.php");
require("todoModel.php");
// if (! isset($_SESSION['uID']) or $_SESSION['uID'] <= "") { //uID未定義(沒有登入) 或 內容為空
// 	header("Location: loginForm.php"); //要求登入
// }

$mom=mysqli_real_escape_string($conn,$_POST['mom']);
$dad=mysqli_real_escape_string($conn,$_POST['dad']);
$money_type=mysqli_real_escape_string($conn,$_POST['money_type']);
$student_id=mysqli_real_escape_string($conn,$_POST['student_id']);
addJob($student_id,$mom,$dad,$money_type);
$msg="Message updateded";
header("Location: student_table.php?m=$msg");
?>
