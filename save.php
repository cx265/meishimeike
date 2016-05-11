<?php
	session_start();
	header("Content-Type: text/html; charset=utf-8");
	require("./admin/connect.php");

		$_id = $_GET['id'];
		$_truename = $_POST['truename'];
		$_nickname = $_POST['nickname'];
		$_sex = $_POST['sex'];
		$_birth = $_POST['birth'];
		$_email = $_POST['email'];
		$_telephone = $_POST['telephone'];
		$_qq = $_POST['qq'];
		$_introduce = $_POST['introduce'];
		$_face = $_POST['user_face'];
			if ($_face == "") {
				$_result = mysql_query("UPDATE user SET  truename='$_truename',nickname='$_nickname',sex='$_sex',birth='$_birth',email='$_email',telephone='$_telephone',qq='$_qq',introduce='$_introduce' WHERE id='$_id' LIMIT 1");
				if($_result){
					$_SESSION['user']=$_nickname;
					echo "<script language='javascript'>alert('个人信息修改成功!');
					window.location='mycourse.php?id=".$_id."'</script>";
				}
				else
					echo "<script language='javascript'>alert('个人信息修改失败!');
					window.location='mycourse.php?id=".$_id."'</script>";
			}
			else{
				$_result = mysql_query("UPDATE user SET  truename='$_truename',nickname='$_nickname',sex='$_sex',birth='$_birth',email='$_email',telephone='$_telephone',qq='$_qq',introduce='$_introduce',face='$_face' WHERE id='$_id' LIMIT 1");
				if($_result){
					$_SESSION['user']=$_nickname;
					echo "<script language='javascript'>alert('个人信息修改成功!');
					window.location='mycourse.php?id=".$_id."'</script>";
				}
				else
					echo "<script language='javascript'>alert('个人信息修改失败!');
					window.location='mycourse.php?id=".$_id."'</script>";
			}
?>