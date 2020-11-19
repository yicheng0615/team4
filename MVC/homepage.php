<?php 
session_start();
require("dbconnect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首頁</title>
</head>

<body>

<h1> 暫時選單 </h1>

<hr />

<button class="button" style="vertical-align:middle" onclick="location.href='student_table.php'"><span>學生 </span></button>
<button class="button" style="vertical-align:middle" onclick="location.href='teacherTable.php'"><span>  老師 </span></button>
<button class="button" style="vertical-align:middle" onclick="location.href='secretaryTable.php'"><span>秘書 </span></button>
<button class="button" style="vertical-align:middle" onclick="location.href='principleTable.php'"><span>校長 </span></button>
<p>


<a href="loginForm.php">登出</a> 

</body>
</html>
<style type="text/css">
body {
  background-color: AliceBlue;
}

h1 {
  color: Black;
  font-family: Courier New;
}

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 10px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '»';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}





</style>