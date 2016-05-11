<?php
error_reporting(0);
	require 'connect.php';
	$_id = $_GET['id'];
	$_page = $_GET['page'];

	if ($_id) {
		$_sql = mysql_query("DELETE FROM groups WHERE id='$_id' LIMIT 1");
			echo "<script language='javascript'>alert('讨论组删除成功！');
			window.location='users.php?answer=u2&page=".$_page."'</script>";
	}
	else{
		echo "<script language='javascript'>alert('讨论组删除失败！');
			window.location='users.php?answer=u2&page=".$_page."'</script>";
	}
?>