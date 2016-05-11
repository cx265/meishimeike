<?php
	session_start();
    header("Content-Type: text/html; charset=utf-8");
    require("./admin/connect.php");

if ($_POST['submit']){
	$_videoid = $_POST['videoid'];
	$_name = $_SESSION['user'];
	$_result = mysql_query("SELECT * FROM user WHERE nickname='$_name' LIMIT 1");
	$_row = mysql_fetch_array($_result);
	$_uid = $_row['id'];
	$_content = $_POST['content'];

	$_re = mysql_query("INSERT INTO note (sid,uid,content,note_time) VALUES('$_videoid','$_uid','$_content',NOW())");
    $_a_result = mysql_query("SELECT * FROM user WHERE nickname='$_name' LIMIT 1");
    $_a_row = mysql_fetch_array($_a_result);
    $_a_uid = $_a_row['id'];
    $_a = "你记录的笔记：".$_content;
    mysql_query("INSERT INTO mytrack (uid,foot,action,time) VALUES ('$_a_uid','$_a','$_videoid',NOW())");
	if ($_re) {
		echo "<script language='javascript'>alert('笔记记录成功!');window.location.href='contact.php?id=$_videoid'</script>";
	}else{
	echo "<script language='javascript'>alert('笔记记录失败!');window.location.href='contact.php?id=$_videoid'</script>";
	}
}else{
    echo "<script language='javascript'>alert('笔记记录失败!');window.location.href='contact.php?id=$_videoid'</script>";
}
?>