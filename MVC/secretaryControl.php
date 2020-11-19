<?php
require("studentModel.php");
if (! isset($_SESSION['uID']) or $_SESSION['uID'] <= "") { //uID未定義(沒有登入) 或 內容為空
	header("Location: loginForm.php"); //要求登入
}

$id=(int)$_POST['id'];
$student_id=mysqli_real_escape_string($conn,$_POST['student_id'])
$secretary_comment=mysqli_real_escape_string($conn,$_POST['secretary_comment']);
$secretary_status=mysqli_real_escape_string($conn,$_POST['secretary_status']);
$secretary_result=mysqli_real_escape_string($conn,$_POST['secretary_result']);

if ($student_id) {
	updateJob($id,$student_id,$secretary_comment,$secretary_status,$secretary_result);
	$secretary_comment="Message updateded";
} else {
	$secretary_comment= "Message title cannot be empty";
}
header("Location: todoListView.php?m=$secretary_comment");
