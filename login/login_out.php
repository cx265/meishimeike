<?php
	session_start();
	header("Content-Type: text/html; charset=utf-8");


	session_unset("username");

echo "<script language='javascript'>window.location='../index.php'</script>";

?>