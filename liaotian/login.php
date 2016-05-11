<?php session_start();
  require('config.php');
  $_id = $_GET['id'];
;?>
<html>
<head>
<title>每十云课堂</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="180" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CBB486">
  <tr>
    <td height="30" align="left" bgcolor="#F5E6C1">欢迎您：
     <span style="color:#1094FF;"><?php echo($_SESSION['user']) ;?></span></td>
  </tr>
  <tr>
  </tr>
</table>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="180" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CBB486">
  <tr>
    <td height="30" align="left" bgcolor="#F5E6C1">讨论话题：<span style="color:#1094FF;">
    <?php
    $_a = mysql_query("SELECT * FROM groups WHERE id='$_id' LIMIT 1");
    $_b = mysql_fetch_array($_a);
    $_uid = $_b['group_leader'];
    $_c = mysql_query("SELECT * FROM user WHERE id='$_uid' LIMIT 1");
    $_d = mysql_fetch_array($_c);

    echo($_b['title']) ;?></span></td>
  </tr>
  <tr>
  </tr>
</table>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<?php if ($_SESSION['user']!=$_d['nickname']) {
?>
<table width="180" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CBB486">
  <tr>
    <td height="30" align="left" bgcolor="#F5E6C1">组长：<span style="color:#1094FF;">
    <?php
    echo($_d['nickname']) ;?></span></td>
  </tr>
  <tr>
  </tr>
</table>
<?php
}else{
?>
<table width="180" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CBB486">
  <tr>
    <td height="30" align="left" bgcolor="#F5E6C1">组员：<span style="color:#1094FF;">
    <form action="../delete.php?gid=<?php echo($_id);?>" method="post">
    <select style="width:115px;" name="group" id="group">
    <?php
    $_result = mysql_query("SELECT * FROM group_p WHERE gid='$_id' ");
    while ($_row = mysql_fetch_array($_result)) {
      $_userid = $_row['uid'];
      $_result_user = mysql_query("SELECT * FROM user WHERE id='$_userid' limit 1");
      $_row_user = mysql_fetch_array($_result_user);
      $_name = $_row_user['nickname'];
      if ($_name!=$_SESSION['user']) {
    ?>
          <option value="<?php echo($_userid);?>"><?php echo($_name);?></option>
    <?php
    }      }
    ?>
    </select>
    <input type="submit" value="踢人"></form>
    </span></td>
  </tr>
  <tr>
  </tr>
</table>
<?php
}
?>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="180" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CBB486">
  <tr>
    <td height="30" align="left" bgcolor="#F5E6C1">在线人数：<span style="color:red;">1</span></td>
  </tr>
  <tr>
  </tr>
</table>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="180" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CBB486">
<?php
$_a = date(d);
if ($_a>15) {
    $_a = $_a-15;
}
        $_result_video = mysql_query("SELECT * FROM video WHERE status='1' and id='$_a' LIMIT 1");
        $_row = mysql_fetch_array($_result_video);
          $_id = $_row['id'];
          $_theme = $_row['theme'];
          if ($_row['video_img']=="") {
            $_img = "default.jpg";
          }else{
            $_img = $_row['video_img'];
          }
?>
  <tr>
    <td height="70" bgcolor="#F5E6C1" class="login">参考视频：<a href="../contact.php?id=<?php echo($_id);?>" title="<?php echo ($_theme) ;?>" target="_blank"><img height="50px" width="50px" src="../upload/images/videoimg/<?php echo ($_img) ;?>" alt="" title=""></a></td>
  </tr>
</table>
</body>
</html>