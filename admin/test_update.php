<?php
error_reporting(0);
    session_start();
    header("Content-Type:text/html; charset=utf-8");
    if (!isset($_COOKIE['user'])||$_COOKIE['user']!='admin') {
        echo "<script language='javascript'>alert('您不是管理员!无法登录后台管理系统!');
        window.location='login.php'</script>";
    }else
    require("connect.php");
    $_page = $_GET['page'];
    $_id = $_GET['id'];
    $_result = mysql_query("SELECT * FROM test WHERE id='$_id' LIMIT 1");
    $_rows = mysql_fetch_array($_result);
    $_sid = $_rows['sid'];
    if ($_sid!=0) {
        $_re = mysql_query("SELECT * FROM video WHERE id='$_sid' ");
        $_row = mysql_fetch_array($_re);
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台界面</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="function.php"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<script src="jquery.jclock-1.2.0.js.txt" type="text/javascript"></script>
<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">

	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
$(function(){
    $('#example_3').datetimepicker({
        showSecond: true,
        showMillisec: true,
        timeFormat: 'hh:mm:ss'
    });

});

</script>
<script type="text/javascript">
$(function($) {
    $('.jclock').jclock();
});
</script>

<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />
<!-- 注册/登录时间 -->
<link rel="stylesheet" type="text/css" href="./css/jquery-ui.css" />
<script type="text/javascript" src="./js/jquery-ui-slide.min.js"></script>
<script type="text/javascript" src="./js/jquery-ui.js"></script>
<script type="text/javascript" src="./js/jquery-ui-timepicker-addon.js"></script>

<link rel="stylesheet" type="text/css" media="all" href="./css/users_update.css" />


</head>
<body>
<div id="main_container">

	<div class="header">
    <div class="logo"><a href="#"><img src="../images/logo.png" alt="" title="" border="0" /></a></div>

    <div class="right_header">欢迎您,管理员 <a href="index.php">首站</a> | <a href="#" class="messages">新消息</a> | <a href="loginout.php" class="logout">退出</a></div>
    <div class="jclock"></div>
    </div>

    <div class="main_content">

                    <div class="menu">
                    <ul>
                    <li><a href="./index.php">首页</a></li>
                    <li><a href="./users.php?answer=u1">用户管理<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="./users.php?answer=u1" title="">注册用户</a></li>
                        <li><a href="./users.php?answer=u2" title="">小组管理</a></li>
                        <li><a href="./users.php?answer=u3" title="">名师风采</a></li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    <li><a href="./MicorClass.php?answer=c1">微课管理<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="./MicorClass.php?answer=c1" title="">微课审阅</a></li>
                        <li><a href="./MicorClass.php?answer=c2" title="">微课发布</a></li>
                        <li><a href="./MicorClass.php?answer=c3" title="">微课评价</a></li>
                        <li><a href="./MicorClass.php?answer=c4" title="">微课分类</a></li>
                        <li><a href="./MicorClass.php?answer=c5" title="">分类管理</a></li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    <li><a class="current" href="./subject.php?answer=s1">试题管理<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="./subject.php?answer=s1" title="">试题库</a></li>
                        <li><a href="./subject.php?answer=s2" title="">编辑试题</a></li>
                        <li><a href="./subject.php?answer=s3" title="">推荐试题</a></li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    <li><a href="./message.php?answer=m1">内容管理<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="./message.php?answer=m1" title="">站内消息</a></li>
                        <li><a href="./message.php?answer=m2" title="">发布消息</a></li>
                        <li><a href="./message.php?answer=m3" title="">意见箱</a></li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    </ul>
                    </div>
<div class="center_content">

    <div class="left_content">

    	<div class="sidebarmenu">

            <a class="menuitem" href="./subject.php?answer=s1">试题库</a>
            <a class="menuitem" href="./subject.php?answer=s2">编辑试题</a>
			<a class="menuitem" href="./subject.php?answer=s3">推荐试题</a>
        </div>

		<div class="sidebar_box">
            <div class="sidebar_box_top"></div>
            <div class="sidebar_box_content">
            <h3>操作简介</h3>
            <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
            <ul>
            <li><strong>试题库:</strong><br />搜索全部的试题,进行对试题的审阅、批准、删除!</li>
            <li><strong>编辑试题:</strong><br />对先关微课的试题进行编辑,对试题的题目以及答案进行匹配,整理和添加到先关微课视频的自测试题中!</li>
            <li><strong>推荐试题:</strong><br />由用户提供的试题,我们会进行分类整理,对试题的答案进行编辑,将试题添加到先关微课视频的自测试题中!</li>
            </ul>
            </div>
            <div class="sidebar_box_bottom"></div>
        </div>
        <div class="sidebar_box">
            <div class="sidebar_box_top"></div>
            <div class="sidebar_box_content">
            <h4>关于我们</h4>
            <img src="images/notice.png" alt="" title="" class="sidebar_icon_right" />
            <p>
            微学堂是开放性网站，版权归开发组所有!
            </p>
            </div>
            <div class="sidebar_box_bottom"></div>
        </div>

    </div><!-- end of left content-->

    <div class="right_content">
        <a href="#nogo" class="bt_green"><span class="bt_green_lft"></span><strong>试题编辑</strong><span class="bt_green_r"></span></a>
        <a style="cursor:pointer;margin-left:390px;" onmouseover="this.style.cssText='cursor:pointer;color:#FCD209; text-decoration:underline;margin-left:390px;'" onmouseout="this.style.cssText='color:white;text-decoration:none;margin-left:390px;'" href="subject.php?answer=s1&page=<?php echo($_page) ?>" class="bt_green"><span class="bt_green_lft"></span><strong>返回《《</strong><span class="bt_green_r"></span></a>

            <div class="form">
            <form action="test_update_save.php?id=<?php echo($_id) ?>&page=<?php echo($_page) ?>" method="post" name="niceform" class="niceform" enctype="multipart/form-data">

            <fieldset>

            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_table">
                <tr>
                    <td width="25%" height="35" align="right">题　目:</td>
                    <td width="75%"><textarea name="test_title" cols="26" rows="6"><?php echo $_rows['test_title']; ?></textarea></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">关联视频:</td>
                    <td width="75%"><input type="text" name="theme" value="<?php echo $_row['theme']; ?>"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">关联视频ID:</td>
                    <td width="75%"><input type="text" name="sid" value="<?php echo $_rows['sid']; ?>"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">选项A:</td>
                    <td width="75%"><input type="text" name="test_a" value="<?php echo $_rows['test_a']; ?>"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">选项B:</td>
                    <td width="75%"><input type="text" name="test_b" value="<?php echo $_rows['test_b']; ?>"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">选项C:</td>
                    <td width="75%"><input type="text" name="test_c" value="<?php echo $_rows['test_c']; ?>"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">选项D:</td>
                    <td width="75%"><input type="text" name="test_d" value="<?php echo $_rows['test_d']; ?>"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">正确选项:</td>
                    <td width="75%"><input type="text" name="test_answer" value="<?php echo $_rows['test_answer']; ?>"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">出题时间:</td>
                    <td width="75%"><input type="text" name="test_time" value="<?php echo $_rows['test_time']; ?>" id="example_3"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">审核:</td>
                    <td width="75%">&nbsp;&nbsp;&nbsp;
                        <?php if ($_rows['status']==1) echo "<a href=test_edit.php?A=1&page=".$_page."&status=1&id=".$_rows['id'].">已审核</a>";
                        else echo "<a style='color:red;' href=test_edit.php?A=1&page=".$_page."&status=0&id=".$_rows['id'].">未审核</a>";?></td>
                </tr>

            </table>

            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="25%" height="20">&nbsp;</td>
                    <td width="75%">&nbsp;</td>
                </tr>
                <tr>
                    <td width="35%" height="35" align="right">&nbsp;</td>
                    <td width="65%"><input style="cursor:pointer" name="submit" type="submit" value="修改" /></td>
                </tr>
            </table>

            </fieldset>

            </form>
            </div>

    </div><!-- end of right content-->

</div>  <!--end of center content -->

    <div class="clear"></div>
    </div> <!--end of main content-->

</div>
</body>
</html>