<?php
	session_start();
	header("Content-Type: text/html; charset=utf-8");
	require("./admin/connect.php");

		$_nickname = $_POST['username'];
		$_password = sha1($_POST['password']);
		$_code = sha1($_POST['codes']);
		$_auth = sha1($_SESSION['auth']);
		$_ip = $_SERVER['REMOTE_ADDR'];
		$_status = 1;

		if($_code != $_auth){
		echo "<script language'javascript'>alert('验证码错误!');window.history.back(-2) </script>";
		}else{

		$_check = mysql_query("SELECT * FROM user WHERE nickname='$_nickname'");
		$_num = mysql_num_rows($_check);
		if($_num!=0){
			echo "<script language='javascript'>alert('用户名已存在!');
			window.location='index.php'</script>";
			exit();
		}else
		$_result = mysql_query("INSERT INTO user (nickname,password,integral,logintime,loginip,status) VALUES ('$_nickname','$_password','0',now(),'$_ip','$_status')");
		if($_result)
			echo "<script language='javascript'>alert('用户注册成功,请登录!');
			window.location='index.php'</script>";
		else
			echo "<script language='javascript'>alert('用户注册失败!');
			window.location='index.php'</script>";
		}
?>