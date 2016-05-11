<?php
error_reporting(0);
    header("Content-Type: text/html; charset=utf-8");
    require("connect.php");

if ($_POST['submit']){
    $_title = $_POST['title'];
    $_post = $_COOKIE['user'];
    $_comments = $_POST['comments'];
    $_status = '0';

    $_result = mysql_query("INSERT INTO message (message_title,message_content,message_time,message_post,status) VALUES('$_title','$_comments',NOW(),'$_post','$_status')");
    echo "<script language='javascript'>alert('发布消息成功!');window.location.href='message.php'</script>";

}else{
    echo "<script language='javascript'>alert('发布消息失败!');window.location.href='message.php'</script>";
}
?>