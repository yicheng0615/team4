<?php
require("userModel.php");
$result=getUserPwd();
while($rs=mysqli_fetch_assoc($result)){
    echo $rs['student_name'],"-----",$rs['student_pwd'], '<br>';
}
?>