<?php
error_reporting(0);
	require 'connect.php';
	$_A = $_GET['A'];
	$_id = $_GET['id'];
	$_page = $_GET['page'];
	$_del = mysql_query("SELECT * FROM video WHERE id='$_id' LIMIT 1");
	$_rows = mysql_fetch_array($_del);
	$_file = iconv("UTF-8","gb2312",$_rows['video_name']);
	$_img = iconv("UTF-8", "gb2312", $_rows['video_img']);
	if ($_A==1) {
		if ($_id) {
		$_sql = mysql_query("DELETE FROM video WHERE id='$_id' LIMIT 1");
		unlink("../upload/video/$_file");
		unlink("../upload/images/videoimg/$_img");
			echo "<script language='javascript'>alert('视频删除成功！');
			window.location='MicorClass.php?answer=c1&page=".$_page."'</script>";
		}
		else{
			echo "<script language='javascript'>alert('视频删除失败！');
				window.location='MicorClass.php?answer=c1&page=".$_page."'</script>";
		}
	}
	else{
		if ($_id) {
			$_sql = mysql_query("DELETE FROM video WHERE id='$_id' LIMIT 1");
			unlink("../upload/video/$_file");
			unlink("../upload/images/videoimg/$_img");
				echo "<script language='javascript'>alert('视频删除成功！');
				window.location='MicorClass.php?answer=c4&page=".$_page."'</script>";
		}
		else{
			echo "<script language='javascript'>alert('视频删除失败！');
				window.location='MicorClass.php?answer=c4&page=".$_page."'</script>";
		}
	}
?>