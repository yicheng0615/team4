<?php
require("dbconnect.php");
require("studentModel.php");
$secretary_status=mysqli_real_escape_string($conn,$_POST['secretary_status']);
if($secretary_status==0){
	$secretary_comment="未符合補助條件";
}
else{
	$secretary_comment=mysqli_real_escape_string($conn,$_POST['secretary_comment']);
}
$secretary_result=mysqli_real_escape_string($conn,$_POST['secretary_result']);
$secretary_id=mysqli_real_escape_string($conn,$_POST['secretary_id']);
//if ($title) { //if title is not empty
	//$sql = "insert into teacher (secretary_comment, secretary_status,secretary_result) values ('$secretary_comment','$secretary_status','secretary_result');";
	//mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	//echo "Message added";
//} else {
	secretaryAdd($secretary_status,$secretary_comment,$secretary_result,$secretary_id);
	// echo $secretary_id;
//}

header("Location: secretaryTable.php");
