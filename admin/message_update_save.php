<?php
error_reporting(0);
	header("Content-Type: text/html; charset=utf-8");
	require("connect.php");

	if ($_POST['submit']) {
		$_page = $_GET['page'];
		$_id = $_GET['id'];
		$_message_title = $_POST['message_title'];
		$_message_post = $_POST['message_post'];
		$_message_content = $_POST['message_content'];
		$_message_time = $_POST['message_time'];

			$_result = mysql_query("UPDATE message SET message_title='$_message_title',message_post='$_message_post',message_content='$_message_content',message_time='$_message_time' WHERE id='$_id' LIMIT 1");
			if($_result){
				echo "<script language='javascript'>alert('消息修改成功!');
				window.location='message.php?page=".$_page."'</script>";
			}
			else{
				echo "<script language='javascript'>alert('消息修改失败!');
				window.location='message_update.php?id=".$_id."&page=".$_page."'</script>";
			}
	}
?>