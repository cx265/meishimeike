<?php
error_reporting(0);
	require 'connect.php';
	header("Content-Type: text/html; charset=utf-8");
	$_id = $_GET['id'];
	$_page = $_GET['page'];

	if ($_id) {
		$_sql = mysql_query("DELETE FROM test WHERE id='$_id' LIMIT 1");
			echo "<script language='javascript'>alert('试题删除成功！');
			window.location='subject.php?answer=s1&page=".$_page."'</script>";
	}
	else{
		echo "<script language='javascript'>alert('试题删除失败！');
			window.location='subject.php?answer=s1&page=".$_page."'</script>";
	}
?>