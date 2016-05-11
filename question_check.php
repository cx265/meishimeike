<?php
	session_start();
    header("Content-Type: text/html; charset=utf-8");
    require("./admin/connect.php");

if ($_POST['submit']){
	$_videoid = $_POST['videoid'];
	$_tid = rand(1,10);
	$_name = $_SESSION['user'];
	$_result = mysql_query("SELECT * FROM user WHERE nickname='$_name' LIMIT 1");
	$_row = mysql_fetch_array($_result);
	$_uid = $_row['id'];
	$_title = "我的问题";
	$_content = $_POST['content'];

	$_re = mysql_query("INSERT INTO question (sid,tid,uid,question_title,question_content,question_time) VALUES('$_videoid','$_tid','$_uid','$_title','$_content',NOW())");
	if ($_re) {
		echo "<script language='javascript'>alert('问题提交成功!');window.location.href='contact.php?id=$_videoid'</script>";
	}else{
	echo "<script language='javascript'>alert('问题提交失败!');window.location.href='contact.php?id=$_videoid'</script>";
	}
}else{
    echo "<script language='javascript'>alert('问题提交失败!');window.location.href='contact.php?id=$_videoid'</script>";
}
?>