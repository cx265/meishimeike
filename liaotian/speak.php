<?php
	$_id = $_GET['id'];
?>
<html>
<head>
<title>每十云课堂</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	.reset{cursor:pointer;width:60px;background: #64BFD5;border: solid 1px #64BFD5;}
	.reset:hover{background:#D7EFFA;}
</style>
<script type="text/javascript" src="../xheditor/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="../xheditor/xheditor.min.js"></script>
		<script type="text/javascript" src="../xheditor/xheditor_lang/zh-cn.js"></script>
		<script type="text/javascript" src="./index.js"></script>
<script type="text/javascript">
// 	function checkpost(){
// 		if (list.words.value.length==0) {
// 			alert("必须要填写讨论内容");
// 			list.words.focus();
// 			return false;
// 		}
// 		return true;
// 	}
// </script>
</head>
<body style="background:#E2F0F6;" >
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="2"></td>
  </tr>
</table><div style="width:540px;">
<form action="show.php?id=<?php echo($_id);?>" method="post" name="list" target="mainFrame" autocomplete="off" onsubmit="return checkpost();">
	<textarea class="xheditor {tools:'mfull'}" cols="82" rows="5" name="words" wrap="virtual" style="background:#E2F0F6;"></textarea><br/>
	<span style="float:right;"><input style="cursor:pointer;width:60px;" type="submit" name="submit" value="提交" class="reset" />
	<input  type="reset" name="reset" value="重置" class="reset" />
	</span>
</form></div>
</body>
</html>