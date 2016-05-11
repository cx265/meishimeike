<?php
error_reporting(0);
if (!isset($_SESSION['user'])) {
	ob_start();
	session_start();
}
//error_reporting(0); //容错语句
$link_ID=mysql_connect("localhost","root","cx123");//链接Mysql服务器
//$link_ID = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS) or die("无法连接数据库");
mysql_select_db("weike"); //选择数据库
//mysql_select_db("app_cxmeishimeike");
mysql_query("set names utf8");//选择编码格式
date_default_timezone_set("Asia/Shanghai"); //设置发言时间格式
?>