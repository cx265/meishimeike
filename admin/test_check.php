<?php
error_reporting(0);
	header("Content-Type: text/html; charset=utf-8");
	require("connect.php");

	if ($_POST['submit']) {
		$_id = $_GET['id'];
		// if ($_id=="" || !isset($_id)) {
		if ($_id!="" && $_id=="") {
			echo "<script language='javascript'>alert('试题没有关联视频!');
			window.location='subject.php?answer=s2'</script>";
		}else{
		$_test_title = $_POST['test_title'];
		$_test_a = $_POST['test_a'];
		$_test_b = $_POST['test_b'];
		$_test_c = $_POST['test_c'];
		$_test_d = $_POST['test_d'];
		$_test_answer = $_POST['test_answer'];
		$_status = "0";

		$_result = mysql_query("INSERT INTO test (sid,test_title,test_a,test_b,test_c,test_d,test_answer,test_time,status) VALUES ('$_id','$_test_title','$_test_a','$_test_b','$_test_c','$_test_d','$_test_answer',NOW(),'$_status')");
		if($_result)
			echo "<script language='javascript'>alert('试题发布成功!');
			window.location='subject.php?answer=s2'</script>";
		else
			echo "<script language='javascript'>alert('试题发布失败!');
			window.location='subject.php?answer=s2'</script>";
	}
}
?>