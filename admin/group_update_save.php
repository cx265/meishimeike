<?php
	header("Content-Type: text/html; charset=utf-8");
	require("connect.php");

	if ($_POST['submit']) {
		$_page = $_GET['page'];
		$_id = $_GET['id'];

		$_group_name = $_POST['group_name'];
		$_group_leader = $_POST['group_leader'];
		$_a = mysql_query("SELECT * FROM user WHERE nickname='$_group_leader' LIMIT 1");
		$_a_row = mysql_fetch_array($_a);
		$_group_leader = $_a_row['id'];
		$_group_time = $_POST['group_time'];
		$_title = $_POST['title'];

			$_result = mysql_query("UPDATE groups SET group_name='$_group_name',group_leader='$_group_leader',group_time='$_group_time',title='$_title' WHERE id='$_id' LIMIT 1");
			if($_result)
				echo "<script language='javascript'>alert('讨论组信息修改成功!');
				window.location='users.php?answer=u2&page=".$_page."'</script>";
			else
				echo "<script language='javascript'>alert('讨论组信息修改失败!');
				window.location='users_update.php?id=".$_id."&page=".$_page."'</script>";
	}
?>