<?php
error_reporting(0);
	header("Content-Type: text/html; charset=utf-8");
	require("connect.php");

	if ($_POST['submit']) {
		$_page = $_GET['page'];
		$_id = $_GET['id'];
		$_truename = $_POST['truename'];
		if ($_POST['password']=="") {
			$_password = null;
		}else{
			$_password = sha1($_POST['password']);
		}
		$_nickname = $_POST['nickname'];
		$_sex = $_POST['sex'];
		$_birth = $_POST['birth'];
		$_rank = $_POST['rank'];
		$_integral = $_POST['integral'];
		$_email = $_POST['email'];
		$_telephone = $_POST['telephone'];
		$_qq = $_POST['qq'];
		$_introduce = $_POST['introduce'];
		$_groupid = $_POST['groupid'];
		$_reg_time = $_POST['reg_time'];
		$_logintime = $_POST['logintime'];
		$_loginip = $_POST['loginip'];

		if (is_null($_password)) {
			$_result = mysql_query("UPDATE user SET  truename='$_truename',nickname='$_nickname',sex='$_sex',birth='$_birth',rank='$_rank',integral='$_integral',email='$_email',telephone='$_telephone',qq='$_qq',introduce='$_introduce',groupid='$_groupid',reg_time='$_reg_time',logintime='$_logintime',loginip='$_loginip' WHERE id='$_id' LIMIT 1");
		}else{
			$_result = mysql_query("UPDATE user SET  truename='$_truename',password='$_password',nickname='$_nickname',sex='$_sex',birth='$_birth',rank='$_rank',integral='$_integral',email='$_email',telephone='$_telephone',qq='$_qq',introduce='$_introduce',groupid='$_groupid',reg_time='$_reg_time',logintime='$_logintime',loginip='$_loginip' WHERE id='$_id' LIMIT 1");
		}
			if($_result)
				echo "<script language='javascript'>alert('个人信息修改成功!');
				window.location='users.php?answer=u1&page=".$_page."'</script>";
			else
				echo "<script language='javascript'>alert('个人信息修改失败!');
				window.location='users_update.php?id=".$_id."&page=".$_page."'</script>";
	}
?>