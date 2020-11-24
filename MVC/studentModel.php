<?php
require_once("dbconnect.php"); //不會重複一直被require 適用於常常會被require的檔案

function studentAdd($student_id, $mom, $dad, $money_type)
{
    global $conn;
    $sql = "INSERT into student(`student_id`,`student_mom`,`student_dad`,`money_type`) values($student_id,'$mom','$dad','$money_type');";
    mysqli_query($conn, $sql); //執行SQL
    $get_last_id = "SELECT LAST_INSERT_ID() as last_id;";
    $last_id = mysqli_fetch_assoc(mysqli_query($conn, $get_last_id));
    $last_id = $last_id['last_id'];
    $last_id = (int)$last_id;
    //一同新增去其他表格
    $other_table = "INSERT into teacher(`student_id`,`teacher_status`)values($last_id,0)";
    mysqli_query($conn, $other_table);
    $other_table = "INSERT into secretary(`student_id`,`secretary_status`)values($last_id,0)";
    mysqli_query($conn, $other_table);
    $other_table = "INSERT into principle(`student_id`,`principle_status`)values($last_id,0)";
    mysqli_query($conn, $other_table);
}
function teacherAdd($teacher_comment, $teacher_status, $tid)
{
    global $conn;
    $sql = "UPDATE teacher SET `teacher_status` = $teacher_status ,`teacher_comment`='$teacher_comment' WHERE `id`=$tid;";
    mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
}
function secretaryAdd($secretary_status, $secretary_comment, $secretary_result, $sid)
{
    global $conn;
    $sql = "UPDATE secretary SET `secretary_comment` = '$secretary_comment', `secretary_status` = $secretary_status,`secretary_result`='$secretary_result' WHERE `id`=$sid;";
    mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
}
function principleAdd($principle_status, $pid)
{
    global $conn;
    $sql = "UPDATE principle SET `principle_status`=$principle_status WHERE `id`=$pid;";
    mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
}
function getStudentList($mode)
{
    //$mode=1 teacher
    //$mode=2 secretary
    //$mode=3 principle
    //$mode=4 student
    global $conn;
    if ($mode >= 4) { //student
        $sql = "SELECT `student`.`id`,`student_data`.`student_name`,`student`.`student_mom`,`student`.`student_dad`,`student`.`money_type`,
        `teacher`.`teacher_status`,`secretary`.`secretary_status`,`principle`.`principle_status` 
        from student,teacher,secretary,principle,student_data
        where student_data.student_id = $mode
        AND $mode=`student`.`student_id`
        AND student.id = teacher.student_id
        AND secretary.student_id = teacher.student_id
        AND principle.student_id = secretary.student_id ;";
        // 多位student
        return mysqli_query($conn, $sql);
    } elseif ($mode == 1) {
        $sql = "SELECT `student_data`.`student_name`,`student`.`student_mom`,`student`.`student_dad`,`student`.`money_type`,
        `teacher`.`teacher_status`,`teacher`.`id`,`teacher`.`student_id`,`teacher`.`teacher_comment`
        from student,teacher,student_data
        where student_data.student_id = student.student_id
        AND student.id = teacher.student_id
        order by `teacher`.`teacher_status`";
        return mysqli_query($conn, $sql);
    } elseif ($mode == 2) {
        $sql = "SELECT `student_data`.`student_name`,`student`.`student_mom`,`student`.`student_dad`,`student`.`money_type`,
        `teacher`.`teacher_status`,`teacher`.`teacher_comment`,`secretary`.`id`,`secretary`.`student_id`,
        `secretary`.`secretary_status`,`secretary`.`secretary_comment`,`secretary`.`secretary_result`
        from student,teacher,secretary,student_data
        where student_data.student_id = student.student_id
        AND student.id = secretary.student_id
        AND teacher.student_id=student.id 
        order by `secretary`.`secretary_status`";
        return mysqli_query($conn, $sql);
    } elseif ($mode == 3) {
        $sql = "SELECT `student_data`.`student_name`,`student`.`student_mom`,`student`.`student_dad`,`student`.`money_type`,
        `teacher`.`teacher_status`,`teacher`.`teacher_comment`,
        `secretary`.`secretary_status`,`secretary`.`secretary_comment`,`secretary`.`secretary_result`,
        `principle`.`student_id`,`principle`.`id`,`principle`.`principle_status`
        from student,teacher,secretary,principle,student_data
        where student_data.student_id = student.student_id
        AND student.id = teacher.student_id
        AND secretary.student_id = teacher.student_id
        AND principle.student_id = secretary.student_id
        order by `principle`.`principle_status` ";
        return mysqli_query($conn, $sql);
    }
}
function getStudentName($mode)
{
    global $conn;
    $sql = "SELECT`student_data`.`student_name`
        from student_data
        where student_data.student_id = $mode";
    return mysqli_query($conn, $sql);
}
