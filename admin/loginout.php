<?php
	//error_reporting(0);
	header("Content-Type: text/html; charset=utf-8");
	if (isset($_COOKIE['user'])) {
		$_username = $_COOKIE['user'];
		setcookie("user","$_username",time()-1);
		echo "<script language='javascript'>alert('已退出!谢谢您的访问！');
		window.location='login.php'</script>";
	}
	else echo "<script language='javascript'>alert('退出失败!错误查找原因:123');
		window.location='index.php'</script>";
?>