<?php
	session_start();
    header("Content-Type: text/html; charset=utf-8");
    require("./admin/connect.php");

if ($_POST['submit']){
	$_vid = $_GET['id'];
	$_uid = $_POST['nick'];
	$_mark = 0;
	$_yi = $_POST['1'];
	$_er = $_POST['2'];
	$_san = $_POST['3'];
	$_si = $_POST['4'];
	$_wu = $_POST['5'];
	if ($_yi=='A') {
		$_mark=$_mark+20;
	}
	if ($_er=='C') {
		$_mark=$_mark+20;
	}
	if ($_san=='B') {
		$_mark=$_mark+20;
	}
	if ($_si=='D') {
		$_mark=$_mark+20;
	}
	if ($_wu=='C') {
		$_mark=$_mark+20;
	}
	$_re = mysql_query("INSERT INTO mark (sid,uid,mark,time) VALUES('$_vid','$_uid','$_mark',NOW())");
	$_nickname = $_SESSION['user'];
    $_a_result = mysql_query("SELECT * FROM user WHERE nickname='$_nickname' LIMIT 1");
    $_a_row = mysql_fetch_array($_a_result);
    $_a_uid = $_a_row['id'];
   
    mysql_query("INSERT INTO mytrack (uid,foot,action,time) VALUES ('$_a_uid','$_mark','$_vid',NOW())");
	if ($_re) {
		echo "<script language='javascript'>alert('测试成功!得分:$_mark 真确答案：A C B D C');window.location.href='contact.php?id=$_vid'</script>";
	}else{
	echo "<script language='javascript'>alert('测试提交失败!');window.location.href='contact.php?id=$_vid'</script>";
	}
}else{
    echo "<script language='javascript'>alert('测试提交失败!');window.location.href='contact.php?id=$_vid'</script>";
}
?>