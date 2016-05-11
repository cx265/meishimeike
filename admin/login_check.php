<?php
error_reporting(0);
	ob_start();
	session_start();
	header("Content-Type: text/html; charset=utf-8");
	require("connect.php");

	if ($_POST['submit']) {
	$_username = $_POST['username'];
	$_nickname = $_POST['username'];
	$_password = sha1($_POST['password']);
	$_code = sha1($_POST['code']);
	$_auth = sha1($_SESSION['auth']);
	$_ip = $_SERVER['REMOTE_ADDR'];
	$_search = mysql_query("SELECT * FROM admin WHERE username='$_username'");
	$_result = mysql_fetch_array($_search);
	$_time = $_result['logintime'];
		if($_code != $_auth){
			echo "<script language'javascript'>alert('验证码错误!');
			window.location='login.php'</script>";
		}else{

		$_check = mysql_query("SELECT * FROM admin WHERE username='$_username'");
		$_num = mysql_num_rows($_check);
		$_rows = mysql_fetch_array($_check);
		if ($_rows['status']==0) {
			echo "<script language='javascript'>alert('当前用户未被管理员审核!');
			window.location='login.php'</script>";
		}
		if($_num==0){
			echo "<script language='javascript'>alert('用户名不存在!');
			window.location='login.php'</script>";
			}
		if ($_username!='admin' && $_nickname!='admin') {
			echo "<script language='javascript'>alert('用户名或密码错误!');window.location='index.php'</script>";
		}
		if ($_password!=$_rows['password']) {
			echo "<script language='javascript'>alert('用户名或密码错误!');
			window.location='login.php'</script>";
		}
		else
			echo "<script language='javascript'>alert('上次登录时间为:".$_time."')</script>";
			mysql_query("UPDATE admin SET logintime = NOW(),loginip = '$_ip' WHERE username='$_username'");
			setcookie("user","$_username",time()+3600*24);
			echo "<script language='javascript'>window.location.href='index.php'</script>";
		}
	}
?>