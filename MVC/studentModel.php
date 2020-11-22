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
function secretaryAdd($secretary_status,$secretary_comment,$secretary_result,$sid)
{
    global $conn;
    $sql = "UPDATE secretary SET `secretary_comment` = '$secretary_comment', `secretary_status` = $secretary_status,`secretary_result`='$secretary_result' WHERE `id`=$sid;";
    mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
}
/*function principleAdd($principle_status)
{
    global $conn;
    $sql = "INSERT into principle($principle_status) values('$principle_status');";
    mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
}*/
function getStudentList($mode)
{
    //$mode=1 teacher
    //$mode=2 secretary
    //$mode=3 principle
    //$mode=4 student
    global $conn;
    if ($mode >= 4) { //student
        $sql = "SELECT `student`.`student_id`,`student`.`student_mom`,`student`.`student_dad`,`student`.`money_type`,
        `teacher`.`teacher_status`,`secretary`.`secretary_status`,`principle`.`principle_status` 
        from student,teacher,secretary,principle
        where student.id = teacher.student_id
        AND secretary.student_id = teacher.student_id
        AND principle.student_id = secretary.student_id";
        // AND student.student_id = $mode 多位student
        return mysqli_query($conn, $sql);
    } elseif ($mode == 1) {
        $sql = "SELECT `student`.`student_mom`,`student`.`student_dad`,`student`.`money_type`,
        `teacher`.`teacher_status`,`teacher`.`id`,`teacher`.`student_id`,`teacher`.`teacher_comment`
        from student,teacher
        where student.id = teacher.student_id";
        return mysqli_query($conn, $sql);
    } elseif ($mode == 2) {
        $sql = "SELECT `student`.`student_mom`,`student`.`student_dad`,`student`.`money_type`,
        `teacher`.`teacher_status`,`teacher`.`teacher_comment`,`secretary`.`id`,`secretary`.`student_id`,
        `secretary`.`secretary_status`,`secretary`.`secretary_comment`,`secretary`.`secretary_result`
        from student,teacher,secretary
        where student.id = secretary.student_id
        AND teacher.student_id=student.id ";
        return mysqli_query($conn, $sql);
    }
}


// function updateJob($id, $title, $msg, $urgent)
// {
//     global $conn;
//     if ($id == -1) {
//         addJob($title, $msg, $urgent);
//     } else {
//         $sql = "update todo set title='$title', content='$msg', urgent='$urgent' where id=$id;";
//         mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
//     }
// }

// function getJobList($bossMode)
// {
//     global $conn; #取得DBconnect.php中定義的連線參數
//     if ($bossMode == "student") { #判斷權限
//         $sql = "select * from student order by student_id desc;";
//     }
//     $result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
//     return $result;
// }

// function setJobFinished($jobID)
// {
//     global $conn; #取得DBconnect.php中定義的連線參數
//     $sql = "update todo set status = 1, finishTime=NOW() where id=$jobID and status = 0;";
//     #工作結束時間=NOW() 現在的系統時間 且只有未完成的工作(status=0)能設成已完成
//     return mysqli_query($conn, $sql) or die("MySQL query error"); //執行SQL

// }

// function rejectJob($jobID)
// {
//     global $conn;
//     $sql = "update todo set status = 0 where id=$jobID and status = 1;";
//     mysqli_query($conn, $sql);
// }

// function setClosed($jobID)
// {
//     global $conn;
//     $sql = "update todo set status = 2 where id=$jobID and status = 1;";
//     mysqli_query($conn, $sql);
// }
// function getJobDetail($jobID)
// {
//     global $conn;
//     if ($jobID == -1) { //要新增
//         $rs = [
//             "id" => -1,
//             "title" => "new title",
//             "content" => "job description",
//             "urgent" => "一般"
//         ];
//     } else {
//         $sql = "select id,title,content,urgent from todo where id = $jobID;";
//         $result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
//         $rs = mysqli_fetch_assoc($result);
//     }

//     return $rs;
// }
