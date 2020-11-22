<?php
session_start();
require("dbconnect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>secretary</title>
</head>
<body>
<h1>Secretary Page</h1>
<?php echo $_GET['id'];?>
<form method="post" action="secretaryAdd.php">

    secretary_status:<input type="radio" name="secretary_status" value="1" checked> 審核通過
                     <input type="radio" name="secretary_status" value="0"> 審核失敗<br>
                     
    secretary_result:"審核通過"准許補助: $<input name="secretary_result" type="text" id="secretary_result" /> <br>
    secretary_comment: <input name="secretary_comment" type="text" id="secretary_comment" /> <br>

    <input type="hidden" name="secretary_id" value="<?php echo $_GET['id'];?>">
    <input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table>
</body>
</html>
