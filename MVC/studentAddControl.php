<?php
require("todoModel.php");
if (! isset($_SESSION['uID']) or $_SESSION['uID'] <= "") { //uID未定義(沒有登入) 或 內容為空
	header("Location: loginForm.php"); //要求登入
}
$title=mysqli_real_escape_string($conn,$_POST['title']);
$msg=mysqli_real_escape_string($conn,$_POST['msg']);
$id=(int)$_POST['id'];
$urgent=mysqli_real_escape_string($conn,$_POST['urgent']);

if ($title) { //if title is not empty
	updateJob($id,$title,$msg,$urgent);
	$msg="Message updateded";
} else {
	$msg= "Message title cannot be empty";
}
header("Location: todoListView.php?m=$msg");
