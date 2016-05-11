<?php
error_reporting(0);
	header("Content-Type: text/html; charset=utf-8");
	$_status = $_GET['status'];
	$_id = $_GET['id'];
	$_page = $_GET['page'];
	$_A = $_GET['A'];

	require("connect.php");
	if ($_A==1) {
		if ($_status==1) {
			$_result = mysql_query("UPDATE user SET status=0 WHERE id='$_id'");
			echo "<script language='javascript'>window.location.href='users_update.php?page=".$_page."&id=".$_id."'</script>";
		}
		else{
			$_result = mysql_query("UPDATE user SET status=1 WHERE id='$_id'");
			echo "<script language='javascript'>window.location.href='users_update.php?page=".$_page."&id=".$_id."'</script>";
		}
	}else{
		if ($_status==1) {
			$_result = mysql_query("UPDATE user SET status=0 WHERE id='$_id'");
			echo "<script language='javascript'>window.location.href='users.php?answer=u1&page=".$_page."'</script>";
		}
		else{
			$_result = mysql_query("UPDATE user SET status=1 WHERE id='$_id'");
			echo "<script language='javascript'>window.location.href='users.php?answer=u1&page=".$_page."'</script>";
		}
	}
?>