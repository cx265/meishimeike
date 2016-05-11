<?php
	$_id = $_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  
<title>每十云课堂--话题聊天室</title><link  rel="shortcut icon"  href="images/1.ico" />
</head>
<frameset rows="*,180" cols="*" framespacing="0" bordercolor="#E1D1AE">
  <frameset rows="*" cols="*,214">
    <frame src="show.php?id=<?php echo($_id);?>" name="mainFrame"/>
    <frame src="login.php?id=<?php echo($_id);?>" name="rightFrame"/>
  </frameset>
  <frame src="speak.php?id=<?php echo($_id);?>" name="bottomFrame"/>
</frameset>
<noframes><body>
</body>
</noframes>
</html>