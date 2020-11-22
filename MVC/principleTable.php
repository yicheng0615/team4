<?php
session_start();
require("dbconnect.php");
require("studentModel.php"); //引入model
$result = getStudentList($_SESSION['uID']);
// $sql = "select student.id,student.student_id,student.student_dad,student_mom,student.money_type,
// teacher.teacher_comment,teacher.teacher_status,secretary.secretary_status,secretary.secretary_result,secretary.secretary_comment
// from student,teacher,secretary where student.student_id=teacher.student_id=secretary.student_id;" ;
// $result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Principle Table</title>
</head>

<body>
  <p>通過"教師、秘書審核"之學生申請資料 </p>
  <hr />
  <hr>
  <table width="800" border="2">
    <tr>
      <td>id</td>
      <td>student id</td>
      <td>student Dad</td>
      <td>student Mom</td>
      <td>money type</td>
      <td>teacher comment</td>
      <td>teacher status</td>
      <td>secretary status</td>
      <td>secretary result</td>
      <td>secretary comment</td>
      <td>principle status</td>
      <td>Document review</td>
    </tr>
    <?php
    while ($rs = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $rs['id'] . "</td>";
      echo "<td>{$rs['student_id']}</td>";
      echo "<td>", $rs['student_dad'];
      echo "<td>", $rs['student_mom'];
      echo "<td>", $rs['money_type'];
      echo "<td>", $rs['teacher_comment'];
      echo "<td>", $rs['teacher_status'];
      echo "<td>", $rs['secretary_status'];
      echo "<td>", $rs['secretary_result'];
      echo "<td>", $rs['secretary_comment'];
      echo "<td>", $rs['principle_status'];
      echo "<td>"; ?>
    <?php if ($rs['principle_status'] == 0) {
        echo "<a href='principleForm.php?id={$rs['id']}'>" . "審核" . "</a>";
      } else {
        echo "結案";
      }
      "</tr>";
    }
    ?>
  </table>
</body>

</html>