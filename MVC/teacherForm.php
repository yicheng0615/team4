<?php
session_start();
require("dbconnect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teacher Form</title>
</head>
<body>
<h1>Teacher Page</h1>
<form method="post" action="teacherAdd.php">

      teacher comment: <input name="teacher_comment" type="text" id="teacher_comment" /> <br>
	  
	  teacher status: <input type="radio" name="teacher_status" value="0" checked> 審核通過
					  <input type="radio" name="teacher_status" value="1"> 審核失敗
	  
	  <br>

      <input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table>
</body>
</html>
