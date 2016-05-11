<?php
	session_start();
    header("Content-Type: text/html; charset=utf-8");
    require("./admin/connect.php");

if ($_POST['submit']){
	$_videoid = $_POST['videoid'];
    $_content = $_POST['content'];
    $_replyer = $_SESSION['user'];
    $_mark = $_POST['fenshu'];
    $_result = mysql_query("INSERT INTO reply (sid,replyer,mark,reply_content,reply_time) VALUES('$_videoid','$_replyer','$_mark','$_content',NOW())");
    echo "<script language='javascript'>alert('课程评论成功!');window.location.href='contact.php?id=$_videoid'</script>";

}else{
    echo "<script language='javascript'>alert('课程评论失败!');window.location.href='contact.php?id=$_videoid'</script>";
}
?>