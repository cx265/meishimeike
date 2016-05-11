<?php
	session_start();
    header("Content-Type: text/html; charset=utf-8");
    require("./admin/connect.php");

if ($_POST['submit']){
	$_sid = $_POST['sid'];
	$_name = $_SESSION['user'];
	$_result = mysql_query("SELECT * FROM user WHERE nickname='$_name' LIMIT 1");
	$_row = mysql_fetch_array($_result);
	$_name = $_row['id'];
	$_content = $_POST['content'];

	$_re = mysql_query("INSERT INTO note_reply (sid,name,content,time) VALUES('$_sid','$_name','$_content',NOW())");
	if ($_re) {
		echo "<script language='javascript'>alert('评价提交成功!');window.location.href='services.php'</script>";
	}else{
	echo "<script language='javascript'>alert('评价提交失败!');window.location.href='services.php'</script>";
	}
}else{
    echo "<script language='javascript'>alert('评价提交失败!');window.location.href='services.php'</script>";
}
?>