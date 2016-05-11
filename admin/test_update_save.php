<?php
error_reporting(0);
	header("Content-Type: text/html; charset=utf-8");
	require("connect.php");

	if ($_POST['submit']) {
		$_page = $_GET['page'];
		$_id = $_GET['id'];
		$_test_title = $_POST['test_title'];
		$_test_a = $_POST['test_a'];
		$_test_b = $_POST['test_b'];
		$_test_c = $_POST['test_c'];
		$_test_d = $_POST['test_d'];
		$_test_answer = $_POST['test_answer'];
		$_test_time = $_POST['test_time'];
		$_sid = $_POST['sid'];

		$_check = mysql_query("SELECT * FROM test WHERE id='$_id' ");
		$_result = mysql_query("UPDATE test SET sid='$_sid',test_title='$_test_title',test_a='$_test_a',test_b='$_test_b',test_c='$_test_c',test_d='$_test_d',test_answer='$_test_answer',test_time='$_test_time' WHERE id='$_id' LIMIT 1");
		if($_result)
			echo "<script language='javascript'>alert('试题修改成功!');
			window.location='subject.php?answer=s1&page=".$_page."'</script>";
		else
			echo "<script language='javascript'>alert('试题修改失败!');
			window.location='test_update.php?id=".$_id."&page=".$_page."'</script>";
	}
?>