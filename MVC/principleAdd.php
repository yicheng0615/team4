<?php
require("dbconnect.php");
require("studentModel.php");
$principle_status=mysqli_real_escape_string($conn,$_POST['principle_status']);
$principle_id=mysqli_real_escape_string($conn,$_POST['principle_id']);
//if ($title) { //if title is not empty
	//$sql = "insert into teacher (principle_status) values ('$principle_status');";
	//mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	//echo "Message added";
//} else {
	principleAdd($principle_status,$principle_id);
//}

header("Location: principleTable.php");
?>