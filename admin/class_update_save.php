<?php
error_reporting(0);
	header("Content-Type: text/html; charset=utf-8");
	require("connect.php");

	if ($_POST['submit']) {
		$_page = $_GET['page'];
		$_id = $_GET['id'];
		$_theme = $_POST['theme'];
		$_video_content = $_POST['video_content'];
		$_video_uploader = $_POST['video_uploader'];
		$_video_type = $_POST['video_type'];
		$_video_time = $_POST['video_time'];
		$_video_playcount = $_POST['video_playcount'];

			$_result = mysql_query("UPDATE video SET  theme='$_theme',video_content='$_video_content',video_uploader='$_video_uploader',video_type='$_video_type',video_time='$_video_time',video_playcount='$_video_playcount' WHERE id='$_id' LIMIT 1");
			if($_result)
				echo "<script language='javascript'>alert('视频信息修改成功!');
				window.location='MicorClass.php?page=".$_page."'</script>";
			else
				echo "<script language='javascript'>alert('视频信息修改失败!');
				window.location='class_update.php?id=".$_id."&page=".$_page."'</script>";
	}
?>