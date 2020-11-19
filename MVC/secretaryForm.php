<?php
session_start();
if (! isset($_SESSION['uID']) or $_SESSION['uID'] <= "") { //uID未定義(沒有登入) 或 內容為空
	header("Location: loginForm.php"); //要求登入
}
require("secretaryModel.php");
/*$id = (int)$_GET['id'];*/
$id=1;
$rs=getJobDetail($id);
if (! $rs) {
	echo "no data found";
	exit(0);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>secretary check form</title>
</head>
<body>
<h1>secretary check</h1>
<form method="post" action="secretaryControl.php">

    <input type='hidden' name='id' value='<?php echo $id ?>'>
    student_id: <input name="student_id" type="text" id="student_id" value="<?php echo $rs['student_id'];?>" /> <br>
    student_mom: <input name="student_mom" type="text" id="student_mom" value="<?php echo $rs['student_mom']?>" /> <br>
    secretary_status:<input name="secretary_status" type="text" id="secretary_status" value="<?php echo $rs['secretary_status']?>" /> <br>
    secretary_result:<select name="secretary_result" type="select" id="secretary_result" /> 
				<?php
					echo "<option value='{$rs['secretary_result']}'>{$rs['secretary_result']}</option>";
				?>
					<option value='一般'>准許</option>
					<option value='重要'>否決</option>
					</select>
	  <br>

      <input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table>
</body>
</html>
