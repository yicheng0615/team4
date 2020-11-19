<?php
require("dbconnect.php");
$mom=mysqli_real_escape_string($conn,$_POST['mom']);
$dad=mysqli_real_escape_string($conn,$_POST['dad']);
$money_type=mysqli_real_escape_string($conn,$_POST['money_type']);

if ($title) { //if title is not empty
	$sql = "insert into student (`student_id`, `student_mom`, `student_dad`, `money_type`) values ('$mom', '$dad','$money_type',0, NOW());";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	echo "Message added";
} else {
	echo "Message title cannot be empty";
}

?>
<a href="todoList.php">Back</a>