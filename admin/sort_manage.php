<?php
require("./connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>分类管理</title>
    <script type="text/javascript" src="js/sort_manage.js"></script>
<style type="text/css">
* {
	padding:0;
	margin:0;
}
#main {
	font: 14px Arial, Helvetica, sans-serif;
	overflow-x: hidden;
	overflow-y:auto;
	color:#444444;
}
#main {
	width:600px;
	margin:20px auto;
}
#main table{
	margin-top:8px;
	width:100%;
	border-collapse:collapse;
	border-spacing:0px;
	background-color: #EFEFEF;
	border:0px;
}
#main table td{
	line-height:20px;
	border:1px solid #FFF;
	padding:5px;
}
#main table thead td {
	background:#C6C6C6;
	font-size:15px;
	text-align:center;
	line-height:23px;
	font-weight:bold;
}
.input {
	border-top: 1px inset;
	border-left: 1px inset;
	padding:2px 3px;
}
</style>
</head>
<body>
<div id="main"> <a href="?answer=c5&action=">分类列表</a> <a href="?answer=c5&action=add">添加分类</a>
<div style="height:500px;width:620px;overflow-y: auto; overflow-x:hidden;">
  <?php
switch($_GET['action']){
	case 'add':
		$class_arr=array();
		$sql = "SELECT * from `class` order by orderid asc, id Desc";
		$query = mysql_query($sql);
		while($row = mysql_fetch_array($query)){
			$class_arr[] = array($row['id'],$row['classname'],$row['parentid'],$row['orderid']);
		}
		?>
  <form action="?answer=c5&action=act_add" method="post" autocomplete="off" onsubmit="return check()">
    <table border="0" cellpadding="0" cellspacing="0" class="table02">
      <thead>
        <tr>
          <td colspan="2"><div align="center">添加分类</div></td>
        </tr>
      </thead>
      <tr>
        <td><div align="right">分类名称：</div></td>
        <td><input name="classname" type="text" class="input" id="classname" value="" size="40" /></td>
      </tr>
      <tr>
        <td><div align="right">所属分类ID：</div></td>
        <td><select name="parentid" id="parentid">
            <option value="0">-----顶级分类-----</option>
            <?php
            	category_select(0,0,0);
			?>
          </select>
        </td>
      </tr>
      <tr>
        <td><div align="right">排序：</div></td>
        <td><input name="orderid" type="text" class="input" id="orderid" value="0" size="25" /></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
            <input type="submit" name="button" id="button" value="添加分类" />
            <input type="reset" name="button2" id="button2" value="重置" />
          </div></td>
      </tr>
    </table>
  </form>
  <?php
		break;
	case 'act_add':
		$sql = "INSERT INTO `class` (`classname`,`parentid`,`orderid`) VALUES('".$_POST['classname'];
		$sql .= "',".$_POST['parentid'].",".$_POST['orderid'].")";
		mysql_query($sql);
		msg('添加成功!','?answer=c5&action=');
		break;
	case 'edit':
		$class_arr=array();
		$result = mysql_query("SELECT * from `class` order by orderid asc, id Desc");
		while($row = mysql_fetch_array($result)){
			$class_arr[] = array($row['id'],$row['classname'],$row['parentid'],$row['orderid']);
		}
	$sql  = "SELECT * from `class` where id=".$_GET['id'];
	$query = mysql_query($sql);
	$row = mysql_fetch_array($query);
	if($row){
	?>
      <form action="?answer=c5&action=act_edit" method="post" autocomplete="off">
    <table border="0" cellpadding="0" cellspacing="0" class="table02">
      <thead>
        <tr>
          <td colspan="2"><div align="center">修改分类</div></td>
        </tr>
      </thead>
      <tr>
        <td><div align="right">分类名称：</div></td>
        <td><input name="classname" type="text" class="input" id="classname" value="<?php echo $row['classname'];?>" size="40" /></td>
      </tr>
      <tr>
        <td><div align="right">所属分类ID：</div></td>
        <td><select name="parentid" id="parentid">
            <option value="0">-----顶级分类-----</option>
            <?php
            	category_select(0,0,$row['parentid']);
			?>
          </select>
        </td>
      </tr>
      <tr>
        <td><div align="right">排序：</div></td>
        <td><input name="orderid" type="text" class="input" id="orderid" value="<?php echo $row['orderid'];?>" size="25" /></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
            <input type="submit" name="button" id="button" value="修改分类" />
            <input type="hidden" id="id" name="id" value="<?php echo $_GET['id'];?>" />
            <input type="reset" name="button2" id="button2" value="重置" />
          </div></td>
      </tr>
    </table>
  </form>
    <?php
	}else{
		msg('要修改的记录不存在!','?answer=c5&action=');
	}
		break;
	case 'act_edit':
		$sql  = "SELECT id from `class` where id=".$_POST['id'];
		$query = mysql_query($sql);
		$row = mysql_fetch_array($query);
		if($row){
			if($row['id']==$_POST['classid']){
				msg('修改失败,不能自己是自己的子分类!','?answer=c5&action=');
			}else{
				$sql = "UPDATE `class` set `classname`='".$_POST['classname']."',`parentid`=".$_POST['parentid'];
				$sql .= ",`orderid`=".$_POST['orderid']." where `id`=".$_POST['id'];
				mysql_query($sql);
				msg('修改成功!','?answer=c5&action=');
			}
		}
		break;
	case 'del':
			$sql  = "SELECT * from `class` where id=".$_GET['id'];
			$query = $mysql -> query($sql);
			$row = $mysql -> fetch_array($query);
			if($row){
				$mysql -> query("DELETE `id` FROM `class` WHERE id=".$_GET['id']);
				msg('删除成功!','?answer=c5&action=');
			}else{
				msg('记录不存在!','?answer=c5&action=');
			}
		break;
	case '':
		$class_arr=array();
		$sql = "SELECT * from `class` order by orderid asc, id Desc";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			$class_arr[] = array($row['id'],$row['classname'],$row['parentid'],$row['orderid']);
		}
		?>
    <table class="table">
        <tr>
          <td>分类名称</td>
          <td width="60"><div align="center">排序</div></td>
          <td width="80"><div align="center">操作</div></td>
        </tr>
      <?php category_arr(0,0);?>
    </table>
	  <?php
		break;
		}
	  ?>
	</div>
</div>
</body>
</html>
<?php
function msg($msg,$url)
{
	echo "<script type=\"text/javascript\">alert('$msg');window.location.href='$url';</script>";
}

function category_arr($m,$id)
{
	global $class_arr;
	global $classid;
	if($id=="") $id=0;
	$n = str_pad('',$m,'-',STR_PAD_RIGHT);
	$n = str_replace("-","&nbsp;&nbsp;",$n);
	for($i=0;$i<count($class_arr);$i++){
		if($class_arr[$i][2]==$id){
		echo "<tr>\n";
		echo "	  <td>".$n."|--<a href=\"?answer=c5&action=edit&amp;id=".$class_arr[$i][0]."\">".$class_arr[$i][1]."</a></td>\n";
		echo "	  <td><div align=\"center\">".$class_arr[$i][3]."</div></td>\n";
		echo "	  <td><div align=\"center\"><a href=\"?answer=c5&action=edit&amp;id=".$class_arr[$i][0]."\">修改</a>";
		echo " <a href=\"?answer=c5&action=del&amp;id=".$class_arr[$i][0]."\">删除</a>";
		echo "</div></td>\n";
		echo "	</tr>\n";
			category_arr($m+1,$class_arr[$i][0]);
		}
	}
}

function category_select($m,$id,$index)
{
	global $class_arr;
	$n = str_pad('',$m,'-',STR_PAD_RIGHT);
	$n = str_replace("-","&nbsp;&nbsp;",$n);
	for($i=0;$i<count($class_arr);$i++){
		if($class_arr[$i][2]==$id){
			if($class_arr[$i][0]==$index){
				echo "        <option value=\"".$class_arr[$i][0]."\" selected=\"selected\">".$n."|--".$class_arr[$i][1]."</option>\n";
			}else{
				echo "        <option value=\"".$class_arr[$i][0]."\">".$n."|--".$class_arr[$i][1]."</option>\n";
			}
			category_select($m+1,$class_arr[$i][0],$index);
		}
	}
}

?>
