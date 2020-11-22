<?php
require("dbconnect.php");
require("todoModel.php"); //引入model

$msgID=(int)$_GET['id'];
$act =$_GET['act'];
$msg = "Message:$msgID, Action: $act completed.";
if ($msgID>0) {
	switch($act) {
		case 'finish':
			setJobFinished($msgID);
			// $sql = "update todo set status = 1, finishTime=NOW() where id=$msgID and status = 0;";
			break;
		case 'reject':
			rejectJob($msgID);
			break;
		case 'close':
			setClosed($msgID);
			break;
		case 'cancel':
			cancelJob($msgID);
			break;
		default:
			$msg="Invalid action. Ignored.";
			break;
	}
}
header("Location: todoListView.php?m=$msg");
