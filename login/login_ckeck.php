<?php
	session_start();
	header("Content-Type: text/html; charset=utf-8");
	require("../admin/function.php");
	require("../admin/connect.php");

	$_nickname = $_POST['username'];
	$_password = sha1($_POST['password']);
	$_code = sha1($_POST['code']);
	$_auth = sha1($_SESSION['auth']);
	$_ip = egetip();
		if($_code != $_auth){
			echo "<script language'javascript'>alert('验证码错误!');window.location='login.php' </script>";
			exit();
		}
		if($_code == $_auth){

			$_check = mysql_query("SELECT * FROM user WHERE nickname='$_nickname'");
			$_num = mysql_num_rows($_check);
			$_rows = mysql_fetch_array($_check);
			if($_num==0){
				echo "<script language='javascript'>alert('用户名不存在!');
				window.location='login.php'</script>";
				exit();
			}
			if ($_password!=$_rows['password']) {
				echo "<script language='javascript'>alert('用户名或密码错误!');
				window.location='login.php'</script>";
				exit();
			}
			if ($_rows['status']==0) {
				echo "<script language='javascript'>alert('当前用户未被管理员审核、批准！');
				window.location='login.php'</script>";
				exit();
			}
			else{
				mysql_query("UPDATE user SET logintime = NOW(),loginip = '$_ip' WHERE nickname='$_nickname'");
				$_SESSION['user']="$_nickname";
				$_a_result = mysql_query("SELECT * FROM user WHERE nickname='$_nickname' LIMIT 1");
				$_a_row = mysql_fetch_array($_a_result);
				$_a_uid = $_a_row['id'];
				mysql_query("INSERT INTO mytrack (uid,foot,action,time) VALUES ('$_a_uid','你登录《每十云课堂》微课学习网站！','',NOW())");

				echo "<script language='javascript'>alert('登录成功!');
				window.location='../mycourse.php'</script>";
			}
		}
?>