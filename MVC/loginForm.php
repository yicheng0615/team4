<?php 
session_start();
$_SESSION['uID']=""; //定義session變數
// $getValue=$_SESSION['uID']; 取得session變數值
?>
<h1>Login Form</h1>
<span style="color: red;"><?php if (isset($_GET['error_msg'])){echo $_GET['error_msg'];}?></span>
<hr>
<form method="post" action="loginCheck.php" >
User Name: <input type="text" name="student_name"><br>
Password: <input type="password" name="student_pwd"><br>
<input type="submit">
</form>
<a href="getUserPassword.php">Tell me Password</a>