<?php
error_reporting(0);
	require 'connect.php';
	$_id = $_GET['id'];
	$_page = $_GET['page'];

	if ($_id) {
		$_sql = mysql_query("DELETE FROM message WHERE id='$_id' LIMIT 1");
			echo "<script language='javascript'>alert('消息删除成功！');
			window.location='message.php?page=".$_page."'</script>";
	}
	else{
		echo "<script language='javascript'>alert('消息删除失败！');
			window.location='message.php?page=".$_page."'</script>";
	}
?>