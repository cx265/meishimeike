<?php
    session_start();
    error_reporting(0);
    header("Content-Type:text/html; charset=utf-8");
    if (!isset($_COOKIE['user'])||$_COOKIE['user']!='admin') {
        echo "<script language='javascript'>alert('您不是管理员!无法登录后台管理系统!');
        window.location='login.php'</script>";
    }else
    require("connect.php");
    $_name = $_COOKIE['user'];
    $_result = mysql_query("SELECT * FROM admin WHERE nickname='$_name' LIMIT 1");
    $_rows = mysql_fetch_array($_result);
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

</script>
<script type="text/javascript">
$(function($) {
    $('.jclock').jclock();
});
</script>

<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />
<link rel="stylesheet" type="text/css" href="./css/index.css" />

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
                    <li><a class="current" href="./index.php">首页</a></li>
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
                    <li><a href="./subject.php?answer=s1">试题管理<!--[if IE 7]><!--></a><!--<![endif]-->
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
    <table>
        <tr class="title">
            <th>当前用户信息</th>
        </tr>
        <tr>
            <td><img class="face" src="images/userface/<?php echo $_rows['face']; ?>" /></td>
        </tr>
        <tr class="user">
            <td>用户名: <?php echo($_rows['nickname']);?></td>
        </tr>
        <tr class="sex">
            <td>性别: <?php echo($_rows['sex']);?></td>
        </tr>
        <tr class="rank">
            <td>用户级别: <?php echo($_rows['rank']);?></td>
        </tr>
        <tr class="time">
            <td>登录时间: <?php echo($_rows['logintime']);?></td>
        </tr>
        <tr class="ip">
            <td>登录地址: <?php echo($_rows['loginip']);?></td>
        </tr>
    </table>


            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h3>操作简介</h3>
                <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
                <ul>
                <li><strong>后台主页:</strong><br />对后台的数据管理、系统维护、内容更新等...</li>
                <li><strong>网站:</strong><br />微课网站提供一个集学习、交流、讨论、自测为一体的网络平台，学员们可以在这里共同努力进步，为自己的学业生涯画上浓墨重彩的一笔!</li>
                <li><strong>我们:</strong><br />我们诚邀你一起来开发网站!</li>
                </ul>
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>

    </div><!-- end of left content-->

    <div class="right_content">

    <h1>站内信息摘要</h1>

<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
            <td>开发组</td>
            <td colspan="2">Mr.Chen</td>
            <td>当前版本</td>
            <td colspan="2">v1.1 Beta1 Build 20150425</td>
        </tr>
        <tr>
            <td>MySQL版本</td>
            <td>5.0.37</td>
            <td>PHP版本</td>
            <td>5.5.2</td>
            <td>Apache版本</td>
            <td>2.2.4 (Win32)</td>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td class="rounded-foot-left">开发组:</td>
        </tr>
        <tr>
            <td class="rounded-foot-right_o" colspan="6"><p>我们是一个网站开发、项目实践、科技竞赛为目标的一个小型团队!</p>
            <p>本网站由 Mr.Chen 开发并维持运营的网站!网站不具有任何盈利形势,注册会员就能够使用网站的全部功能(学习网站开发、了解开发过程等)。</p></td>
        </tr>
        <tr>
            <td class="rounded-foot-left">网站简介:</td>
        </tr>
        <tr>
            <td class="rounded-foot-right" colspan="6">
            <p>网站前台与后台完全采用PHP代码开发完成。网站主要面向的开发者学习前台与后台开发的同学们。
            我们希望，开发者在开发的过程中感觉快速、舒适，这是我们的追求。
            请关注更多关于我们的信息。</p></td>
        </tr>
    </tfoot>
    <?php
        $_result_message = mysql_query("SELECT * FROM message ");
        $_rows_message = mysql_num_rows($_result_message);
        $_result_reply = mysql_query("SELECT * FROM reply ");
        $_rows_reply = mysql_num_rows($_result_reply);
        $_result_video = mysql_query("SELECT * FROM video ");
        $_rows_video = mysql_num_rows($_result_video);
        $_result_test = mysql_query("SELECT * FROM test ");
        $_rows_test = mysql_num_rows($_result_test);
        $_result_user = mysql_query("SELECT * FROM user ");
        $_rows_user = mysql_num_rows($_result_user);
        $_result_groups = mysql_query("SELECT * FROM groups ");
        $_rows_groups = mysql_num_rows($_result_groups);
    ?>
    <tbody>
    	<tr>
            <td colspan="2">站内消息:</td>
            <td colspan="2"><a href="message.php?answer=m1"><?php echo($_rows_message);?></a></td>

            <td><a href="message.php?answer=m1"><img src="images/user_edit.png" alt="" title="编辑" border="0" /></a></td>
            <td><a href="#" class="ask"><img src="images/trash.png" alt="" title="删除" border="0" /></a></td>
        </tr>
        <tr>
            <td colspan="2">视频评价:</td>
            <td colspan="2"><a href="MicorClass.php?answer=c3"><?php echo($_rows_reply);?></a></td>

            <td><a href="MicorClass.php?answer=c3"><img src="images/user_edit.png" alt="" title="编辑" border="0" /></a></td>
            <td><a href="#" class="ask"><img src="images/trash.png" alt="" title="删除" border="0" /></a></td>
        </tr>
        <tr>
            <td colspan="2">视频数:</td>
            <td colspan="2"><a href="MicorClass.php?answer=c1"><?php echo($_rows_video);?></a></td>

            <td><a href="MicorClass.php?answer=c1"><img src="images/user_edit.png" alt="" title="编辑" border="0" /></a></td>
            <td><a href="#" class="ask"><img src="images/trash.png" alt="" title="删除" border="0" /></a></td>
        </tr>
        <tr>
            <td colspan="2">试题数:</td>
            <td colspan="2"><a href="subject.php?answer=s1"><?php echo($_rows_test);?></a></td>

            <td><a href="subject.php?answer=s1"><img src="images/user_edit.png" alt="" title="编辑" border="0" /></a></td>
            <td><a href="#" class="ask"><img src="images/trash.png" alt="" title="删除" border="0" /></a></td>
        </tr>
        <tr>
            <td colspan="2">注册会员:</td>
            <td colspan="2"><a href="users.php?answer=u1"><?php echo($_rows_user);?></a></td>

            <td><a href="users.php?answer=u1"><img src="images/user_edit.png" alt="" title="编辑" border="0" /></a></td>
            <td><a href="#" class="ask"><img src="images/trash.png" alt="" title="删除" border="0" /></a></td>
        </tr>
        <tr>
            <td colspan="2">讨论组:</td>
            <td colspan="2"><a href="users.php?answer=u2"><?php echo($_rows_groups);?></a></td>

            <td><a href="users.php?answer=u2"><img src="images/user_edit.png" alt="" title="编辑" border="0" /></a></td>
            <td><a href="#" class="ask"><img src="images/trash.png" alt="" title="删除" border="0" /></a></td>
        </tr>

    </tbody>
</table>

    </div><!-- end of right content-->
</div>  <!--end of center content -->

    <div class="clear"></div>
    </div> <!--end of main content-->

</div>
</body>
</html>