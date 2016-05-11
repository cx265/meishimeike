<?php
	session_start();
    header("Content-Type: text/html; charset=utf-8");
    require("./admin/connect.php");

if ($_POST['submit']){
	$_sid = $_POST['sid'];
	$_content = $_POST['content'];

	$_re = mysql_query("INSERT INTO shuoshuo (sid,name,content,time) VALUES('$_sid','admin','$_content',NOW())");
	if ($_re) {
		echo "<script language='javascript'>alert('回答提交成功!');window.location.href='services.php'</script>";
	}else{
	echo "<script language='javascript'>alert('回答提交失败!');window.location.href='services.php'</script>";
	}
}else{
    echo "<script language='javascript'>alert('回答提交失败!');window.location.href='services.php'</script>";
}
?>