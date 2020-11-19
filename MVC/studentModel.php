<?php
// status=0 reject
// status=1 finished
// status=2 close
require_once("dbconnect.php"); //不會重複一直被require 適用於常常會被require的檔案
function addJob($title, $msg, $urgent)
{
    global $conn;
    $sql = "INSERT into todo(title,content,urgent,addTime) values('$title','$msg','$urgent',NOW());";
    mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
}

function cancelJob($jobID)
{
    global $conn;

    $sql = "update todo set status = 3 where id=$jobID and status <> 2;";
    //status不能為2
    mysqli_query($conn, $sql);
}

function updateJob($id, $title, $msg, $urgent)
{
    global $conn;
    if ($id == -1) {
        addJob($title, $msg, $urgent);
    } else {
        $sql = "update todo set title='$title', content='$msg', urgent='$urgent' where id=$id;";
        mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
    }
}

function getJobList($bossMode)
{
    global $conn; #取得DBconnect.php中定義的連線參數
    if ($bossMode == "student") { #判斷權限
        $sql = "select * from student order by student_id desc;";
    }
    $result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
    return $result;
}

function setJobFinished($jobID)
{
    global $conn; #取得DBconnect.php中定義的連線參數
    $sql = "update todo set status = 1, finishTime=NOW() where id=$jobID and status = 0;";
    #工作結束時間=NOW() 現在的系統時間 且只有未完成的工作(status=0)能設成已完成
    return mysqli_query($conn, $sql) or die("MySQL query error"); //執行SQL

}

function rejectJob($jobID)
{
    global $conn;
    $sql = "update todo set status = 0 where id=$jobID and status = 1;";
    mysqli_query($conn, $sql);
}

function setClosed($jobID)
{
    global $conn;
    $sql = "update todo set status = 2 where id=$jobID and status = 1;";
    mysqli_query($conn, $sql);
}
function getJobDetail($jobID)
{
    global $conn;
    if ($jobID == -1) { //要新增
        $rs = [
            "id" => -1,
            "title" => "new title",
            "content" => "job description",
            "urgent" => "一般"
        ];
    } else {
        $sql = "select id,title,content,urgent from todo where id = $jobID;";
        $result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
        $rs = mysqli_fetch_assoc($result);
    }

    return $rs;
}
