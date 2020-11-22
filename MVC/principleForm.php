<?php
session_start();
require("dbconnect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>principle Form</title>
</head>
<body>
<h1>Principle Page</h1>
<form method="post" action="principleAdd.php">

    principle_status:<input type="radio" name="principle_status" value="1" checked> 審核通過
                     <input type="radio" name="principle_status" value="0"> 審核失敗<br>
    <input type="hidden" name="principle_id" value="<?php echo $_GET['id'];?>">
      <input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table>
</body>
</html>
