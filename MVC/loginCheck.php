<?php
session_start();
require("userModel.php");

$userName = $_POST['student_name'];
$passWord = $_POST['student_pwd'];

if (checkUserIDPwd($userName, $passWord)) {
    $_SESSION['uID']=checkUserIDPwd($userName, $passWord); //設為student name
    //依權限導致不同畫面
    if($_SESSION['uID'] == "student"){
        header("Location: student_table.php"); 
    }
    elseif($_SESSION['uID'] == "teacher"){
        header("Location: teacherTable.php");
    }
    elseif($_SESSION['uID'] == "secretary"){
        header("Location: secretaryTable.php");
    }
    elseif($_SESSION['uID'] == "principle"){
        header("Location: principleTable.php");
    }
} else { //帳密錯誤
    $_SESSION['uID']="";
    $error_msg= "帳號或密碼錯誤 請再試一次 <br />";
    header("Location: loginForm.php?error_msg=$error_msg");
}
?>
