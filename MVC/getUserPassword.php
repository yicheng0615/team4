<?php
require("userModel.php");
$result=getUserPwd();
print("hii");
while($rs=mysqli_fetch_assoc($result)){
    echo $rs['loginID'],"-----",$rs['password'], '<br>';
}
?>