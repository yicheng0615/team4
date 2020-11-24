<?php
session_start();
require("dbconnect.php");
require("studentModel.php"); //引入model
$result = getStudentName($_SESSION['uID']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>學生申請單</title>
</head>
<body>
<h1>Add New Task</h1>
<form method="post" action="studentAddControl.php">
<?php while ($rs = mysqli_fetch_assoc($result)) {?>
	  student name: <input name="student_name" type="text" value="<?php echo $rs['student_name'] ;}?>" /> <br>
      mom name :   <input name="mom" type="text" id="mom" /> <br>

      dad name :   <input name="dad" type="text" id="dad" /> <br>

	  type :        <select  name="money_type" type="select" id="money_type" /> 
					<option value='低收入戶'>低收入戶</option>
					<option value='中低收入戶'>中低收入戶</option>
					<option value='家庭突發因素'>家庭突發因素</option>
					</select>
	  <br>
	  <input type="hidden" name="student_id" value="<?php echo $_SESSION['uID'];?>">
      <input type="submit" name="Submit" value="送出" />	
	</form>
  </tr>
</table>
</body>
</html>
