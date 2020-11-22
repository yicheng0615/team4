<?php
require("dbconnect.php");

function checkUserIDPwd($userName, $passWord)
{
	global $conn;
	$userName = mysqli_real_escape_string($conn, $userName);
	$isValid = false;

	$sql = "SELECT student_id,student_pwd, student_name FROM student_data WHERE student_name='$userName'";
	if ($result = mysqli_query($conn, $sql)) {
		if ($row = mysqli_fetch_assoc($result)) {
			if ($row['student_pwd'] == $passWord) {
				$isValid = $row['student_id'];
			}
		}
	}
	return $isValid;
}


function getUserPwd()
{
	global $conn;
	$sql = "SELECT * FROM student_data;";
	$result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
	return $result;
}

function setUserPassword($userName)
{
	return false;
}
