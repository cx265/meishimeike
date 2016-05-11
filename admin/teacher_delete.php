<?php
error_reporting(0);
	require 'connect.php';
	$_id = $_GET['id'];
	$_page = $_GET['page'];

	if ($_id) {
		$_sql = mysql_query("DELETE FROM teacher WHERE id='$_id' LIMIT 1");
			echo "<script language='javascript'>alert('教师删除成功！');
			window.location.href='users.php?answer=u3&page=".$_page."'</script>";
	}
	else{
		echo "<script language='javascript'>alert('教师删除失败！');
			window.location.href='users.php?answer=u3&page=".$_page."'</script>";
	}
?>