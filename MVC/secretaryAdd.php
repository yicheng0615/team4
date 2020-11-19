<?php
require("dbconnect.php");
require("studentModel.php");
$secretary_status=mysqli_real_escape_string($conn,$_POST['secretary_status']);
$secretary_comment=mysqli_real_escape_string($conn,$_POST['secretary_comment']);
$secretary_result=mysqli_real_escape_string($conn,$_POST['secretary_result']);

//if ($title) { //if title is not empty
	//$sql = "insert into teacher (secretary_comment, secretary_status,secretary_result) values ('$secretary_comment','$secretary_status','secretary_result');";
	//mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	//echo "Message added";
//} else {
	secretaryAdd($secretary_status,$secretary_comment,$secretary_result);
//}

header("Location: secretaryTable.php");
?>