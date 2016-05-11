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
			$_result = mysql_query("UPDATE video SET status=0 WHERE id='$_id'");
			echo "<script language='javascript'>window.location.href='class_update.php?id=".$_id."&page=".$_page."'</script>";
		}
		else{
			$_result = mysql_query("UPDATE video SET status=1 WHERE id='$_id'");
			echo "<script language='javascript'>window.location.href='class_update.php?id=".$_id."&page=".$_page."'</script>";
		}
	}else{
		if ($_status==1) {
			$_result = mysql_query("UPDATE video SET status=0 WHERE id='$_id'");
			echo "<script language='javascript'>window.location.href='MicorClass.php?answer=c1&page=".$_page."'</script>";
		}
		else{
			$_result = mysql_query("UPDATE video SET status=1 WHERE id='$_id'");
			echo "<script language='javascript'>window.location.href='MicorClass.php?answer=c1&page=".$_page."'</script>";
		}
	}
?>