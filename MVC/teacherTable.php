<?php
session_start();
require("dbconnect.php");
require("studentModel.php"); //引入model
$result = getStudentList($_SESSION['uID']);
// $sql = "select * from student;" ;
// $result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Teacher Table</title>
</head>

<body>
<p>已申請學生申請資料 </p>
<hr />
<hr>
<table width="800" border="2">
  <tr>
    <td>name</td>
    <td>student_id</td>
    <td>student Dad</td>
    <td>student Mom</td>
    <td>money type</td>
    <td>teacher status</td>
    <td>teacher comment</td>
	<td>Document review</td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['student_name'] . "</td>";
	echo "<td>{$rs['student_id']}</td>";
	echo "<td>" , $rs['student_dad'];
	echo "<td>" , $rs['student_mom'];
  echo "<td>" , $rs['money_type'];
  echo "<td>", $rs['teacher_status'], "</td>";
  echo "<td>", $rs['teacher_comment'], "</td>";
  echo "<td>" , "<a href='teacherForm.php?id={$rs['id']}'>"
  ?>
  <?php if($rs['teacher_status'] == 0){echo "審核";}
  echo "</a>" . "</tr>";
}
?>
</table>
</body>

</html>