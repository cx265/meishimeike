<?php
	require("./admin/connect.php");
	  header("Content-Type: text/html; charset=utf-8");
	$_id = $_GET['id'];
	$_user = $_GET['user'];
	$_result_user = mysql_query("SELECT * FROM user WHERE nickname='$_user' ");
	$_rows_user = mysql_fetch_array($_result_user);
	$_uid = $_rows_user['id'];
	$_result = mysql_query("DELETE FROM collect WHERE vid='$_id' and uid='$_uid' ");
	if ($_result) {
		echo "<script language'javascript'>alert('取消收藏成功!');window.location='mycourse.php' </script>";
	}
	else{
		echo "<script language'javascript'>alert('取消收藏失败，你提交的数据有误！');window.location='mycourse.php' </script>";
	}
?>