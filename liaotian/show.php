<?php
	session_start();
	require('config.php');
	$_id = $_GET['id'];
	$nick = $_SESSION['user'];
    $words = $_POST['words'];
?>
<?php
if($words){
$query="INSERT into chat(sid,chtime,nick,words) values('$_id',NOW(),'$nick','$words')";//插入SQL语句
mysql_query($query,$link_ID); //发送留言到数据库
$_a_result = mysql_query("SELECT * FROM user WHERE nickname='$nick' LIMIT 1");
    $_a_row = mysql_fetch_array($_a_result);
    $_a_uid = $_a_row['id'];
    $_b_result = mysql_query("SELECT * FROM groups WHERE id='$_id' LIMIT 1");
    $_b_row = mysql_fetch_array($_b_result);
    $_foot = "你参与了【".$_b_row['group_name']."】话题的讨论！";
    $_b_result = mysql_query("SELECT * FROM mytrack WHERE action='0' and foot='$_foot' and (DATE_SUB(CURDATE(), INTERVAL 1 DAY) <= date(time))");
    $_b_row = mysql_num_rows($_b_result);
    if ($_b_row) {
    }else{
    mysql_query("INSERT INTO mytrack (uid,foot,action,time) VALUES ('$_a_uid','$_foot','',NOW())");
    };

header("refresh:0; URL='show.php?id=$_id'"); }
?>
<html>
<head>
<title>每十云课堂</title>
<link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="./community.css">
<!-- <meta http-equiv="refresh" content="5;url=show.php?id=<?php echo($_id);?>"> -->
</head>
<body style="background:#D7EFFA;">
<?php
	//最新发言显示在最下面
	$sql="SELECT * from chat where sid='$_id' order by chtime asc";
	$result=mysql_query($sql);
	$total=mysql_num_rows($result);
	$info=($total/20-1)*20;
	if($total<20){
	$str="SELECT * from chat where sid='$_id' order by chtime asc;" ; //查询字符串
	}else{
	$str="SELECT * from chat where sid='$_id' order by chtime asc limit $info,20;" ; //查询字符串
	}
 	$result=mysql_query($str,$link_ID); //送出查询
 	while($row=mysql_fetch_array($result)){
 		$nick = $row['nick'];
		$_a = mysql_query("SELECT * FROM user WHERE nickname='$nick' LIMIT 1");
		$_b = mysql_fetch_array($_a);
		$_face = $_b['face'];
?>
<table width="700" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <li class="notelist">
    		<span class="notelist-left">
	    		<img src="../admin/images/userface/<?php echo($_face);?>" style="margin-left:10px;width:30px;height:30px;" class="userimg">
	    		<p style="color:blue;display:block;width:48px;overflow: hidden;white-space: nowrap;"><?php echo($nick);?></p>
    		</span><br/>
    		<img src="../images/icons.png" class="jiantou">
    		<span class="notelist-right">
    		<div class="txt" title=""><?php echo($row['words']);?></div>
    		<div class="actions-wrap">
                    <span class="item-date"><?php echo($row['chtime']);?></span>
            </div>
            </span>
    	</li>
  </tr>
</table>
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="5"></td>
  </tr>
</table>
<?php } ?>
</body>
</html>