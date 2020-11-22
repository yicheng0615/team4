<?php
require("dbconnect.php");
require("studentModel.php");
$teacher_comment=mysqli_real_escape_string($conn,$_POST['teacher_comment']);
$teacher_status=mysqli_real_escape_string($conn,$_POST['teacher_status']);
$teacher_id=$_POST['teacher_id'];
//if ($title) { //if title is not empty
	//$sql = "insert into teacher (teacher_comment, teacher status) values ('$teacher_comment','$teacher_status');";
	//mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	//echo "Message added";
//} else {
	teacherAdd($teacher_comment, $teacher_status,$teacher_id);
//}
header("Location: teacherTable.php");
?>