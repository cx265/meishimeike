<?php
error_reporting(0);
//$_con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS) or die("无法连接数据库");

$_con = mysql_connect("localhost","root","root") or die ('连接失败!');
mysql_query("SET NAMES 'UTF8'");

$_check = mysql_select_db("weike",$_con) or die ('连接数据错误!');

?>