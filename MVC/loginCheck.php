<?php
session_start();
require("userModel.php");

$userName = $_POST['student_name'];
$passWord = $_POST['student_pwd'];

if (checkUserIDPwd($userName, $passWord)) {
    $_SESSION['uID']=checkUserIDPwd($userName, $passWord); //設為student id
    //$_SESSION['uID']=student_id=1 teacher
    //$_SESSION['uID']=student_id=2 secretary
    //$_SESSION['uID']=student_id=3 principle
    //$_SESSION['uID']=student_id=4 student
    //依權限導至不同畫面
    if($_SESSION['uID'] >= "4"){
        header("Location: student_table.php",$_SESSION['uID']); 
    }
    elseif($_SESSION['uID'] == "1"){
        header("Location: teacherTable.php",$_SESSION['uID']);
    }
    elseif($_SESSION['uID'] == "2"){
        header("Location: secretaryTable.php",$_SESSION['uID']);
    }
    elseif($_SESSION['uID'] == "3"){
        header("Location: principleTable.php",$_SESSION['uID']);
    }
} else { //帳密錯誤
    $_SESSION['uID']="";
    $error_msg= "帳號或密碼錯誤 請再試一次 <br />";
    header("Location: loginForm.php?error_msg=$error_msg");
}
?>
