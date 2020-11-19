<?php 
session_start();
$_SESSION['uID']=""; //定義session變數
// $getValue=$_SESSION['uID']; 取得session變數值
?>
<h1>Login Form</h1>
<hr>
<form method="post" action="loginCheck.php" >
User Name: <input type="text" name="id"><br>
Password: <input type="password" name="pwd"><br>
<input type="submit">
</form>
<a href="getUserPassword.php">Tell me Password</a>