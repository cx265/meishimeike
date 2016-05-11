<?php
error_reporting(0);
	header("Content-Type: text/html; charset=utf-8");
	require("connect.php");

	if ($_POST['submit']) {
		$_page = $_GET['page'];
		$_id = $_GET['id'];
		$_teacher_name = $_POST['teacher_name'];
		$_teacher_sex = $_POST['teacher_sex'];
		$_teacher_age = $_POST['teacher_age'];
		$_teacher_degree = $_POST['teacher_degree'];
		$_teacher_occupation = $_POST['teacher_occupation'];
		$_teacher_introduce = $_POST['teacher_introduce'];
		$_motto = $_POST['motto'];

			$_result = mysql_query("UPDATE teacher SET  teacher_name='$_teacher_name',teacher_sex='$_teacher_sex',teacher_age='$_teacher_age',teacher_degree='$_teacher_degree',teacher_occupation='$_teacher_occupation',teacher_introduce='$_teacher_introduce',motto='$_motto' WHERE id='$_id' LIMIT 1");
			if($_result)
				echo "<script language='javascript'>alert('教师信息修改成功!');
				window.location='users.php?answer=u3&page=".$_page."'</script>";
			else
				echo "<script language='javascript'>alert('教师信息修改失败!');
				window.location='teacher_update.php?id=".$_id."&page=".$_page."'</script>";
	}
?>