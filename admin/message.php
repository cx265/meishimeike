<?php
    error_reporting(0);
    session_start();
    header("Content-Type:text/html; charset=utf-8");
    if (!isset($_COOKIE['user'])||$_COOKIE['user']!='admin') {
        echo "<script language='javascript'>alert('您不是管理员!无法登录后台管理系统!');
        window.location='login.php'</script>";
    }
    $_answer = $_GET['answer'];

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
    $(.messages).click(function(){
        alert("暂时没有新消息");
    });

</script>
<script type="text/javascript">
$(function($) {
    $('.jclock').jclock();
});
</script>

<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />
<link rel="stylesheet" type="text/css" href="./css/message.css" />
<script type="text/javascript" src="./js/message.js"></script>

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
                    <li><a href="./subject.php?answer=s1">试题管理<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="./subject.php?answer=s1" title="">试题库</a></li>
                        <li><a href="./subject.php?answer=s2" title="">编辑试题</a></li>
                        <li><a href="./subject.php?answer=s3" title="">推荐试题</a></li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    <li><a class="current" href="./message.php?answer=m1">内容管理<!--[if IE 7]><!--></a><!--<![endif]-->
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

            <a class="menuitem" href="./message.php?answer=m1">站内消息</a>
            <a class="menuitem" href="./message.php?answer=m2">发布消息</a>
            <a class="menuitem submenuheader" href="" >意见箱</a>
                <div class="submenu">
                    <ul>
                    <li><a href="./message.php?answer=m3">未读</a></li>
                    <li><a href="./message.php?answer=m3">已读</a></li>
                    </ul>
                </div>

        </div>

        <div class="sidebar_box">
            <div class="sidebar_box_top"></div>
            <div class="sidebar_box_content">
            <h3>操作简介</h3>
            <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
            <ul>
            <li><strong>站内消息:</strong><br />按(新闻类、通知类、活动类)管理消息,管理员对网站内发布的消息进行核实、修改、删除!</li>
            <li><strong>发布消息:</strong><br />管理员发布网站最新消息,便于用户得知网站的最新动态和站内更新,快速便捷的了解网站!</li>
            <li><strong>意见箱:</strong><br />用户在网站使用过程中,觉得网站的某个功能有需要改进的地方，或者哪个模块有待优化的,都可以向我们提出意见和建议，我们会对每条意见和建议进行阅读并改进!</li>
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
            每十云课堂是开放性网站，版权归开发组所有!
            </p>
            </div>
            <div class="sidebar_box_bottom"></div>
        </div>

    </div><!-- end of left content-->

<?php
    if ($_answer=='m1' || !isset($_answer)) {
?>

    <div class="right_content">
    <?php
        require("connect.php");

        $_pagesize = 5;
        $_result = mysql_query("SELECT * FROM message");
        $_recordcount = mysql_num_rows($_result);
        $_pagecount = ceil($_recordcount/$_pagesize);
        $_page = $_GET['page'];

        if (!is_numeric($_page)) {
            $_page=1;
        }
        $_page=intval($_page);

        if(!isset($_page))
        {
            $_page = 1;
        }
        if($_page>$_pagecount)
        {
            $_page = $_pagecount;
        }

        $_start = ($_page-1)*$_pagesize;
        $_result = mysql_query("SELECT * FROM message ORDER BY id DESC LIMIT $_start,$_pagesize");
    ?>
        <div>

        <a href="#nogo" class="bt_green"><span class="bt_green_lft"></span><strong>站内消息</strong><span class="bt_green_r"></span></a>

            <div class="form">
            <form action="" method="post" name="niceform" class="niceform" enctype="multipart/form-data">

                <fieldset>
                    <table cellspacing="0">
                        <thead>

                            <tr>
                                <td class="checkbox"><input onclick="checkall()" type="checkbox"   name="allcheck" id="allcheck"/></td>
                                <td>标题</td>
                                <td>发布者</td>
                                <td>审阅</td>
                                <td>发布时间</td>
                                <td>操作</td>
                            </tr>

                        </thead>
                        <tbody>
        <?php
            while($_rows = mysql_fetch_array($_result)){
        ?>
                            <tr class="hover">
                                <td class="checkbox"><input type="checkbox" name="checkbox"/></td>
                                <td><?php echo($_rows['message_title']);?></td>
                                <td><?php echo($_rows['message_post']);?></td>
                                <td>
                                    <?php if ($_rows['status']==1) echo "<a href=message_edit.php?page=".$_page."&status=1&id=".$_rows['id'].">已审核</a>";
                                    else echo "<a class='red' href=message_edit.php?page=".$_page."&status=0&id=".$_rows['id'].">未审核</a>";?>
                                </td>
                                <td><?php echo($_rows['message_time']);?></td>
                                <td>
                                    <span>
                                        [ <a href="message_update.php?page=<?php echo ($_page)?>&id=<?php echo($_rows['id'])?>">修改</a> ]
                                    </span>
                                    <span>
                                        [ <a href="message_delete.php?page=<?php echo ($_page)?>&id=<?php echo($_rows['id'])?>">删除</a> ]
                                    </span>
                                </td>
                            </tr>
        <?php
            }
        ?>
                        </tbody>
                    </table>
                </fieldset>

            </form>
            </div>
        </div>

            <div class="paging">
                <span>
                共有<span class="num">[<?php echo $_recordcount;?>]</span>条信息 分<span class="num"><?php echo $_pagecount;?></span>页 <span class="num"><?php echo $_pagesize;?></span>条/页   当前<span class="nowpage">第<?php echo $_page;?>页</span>&nbsp;
                <?php
                    if ($_pagecount == 1) {
                        echo "[首页]  [上页]  [下页]  [末页]";
                    }
                    else if($_page == 1){
                        echo "[首页]  [上页]  <a href=?page=".($_page+1).">[下页]</a>  <a href=?page=$_pagecount>[末页]</a>";
                    }
                    else if($_page == $_pagecount){
                        echo "<a href=?page=1>[首页]</a>  <a href=?page=".($_page-1).">[上页]</a>  [下页]  [末页]";
                    }
                    else{
                        echo "<a href=?page=1>[首页]</a>  <a href=?page=".($_page-1).">[上页]</a>  <a href=?page=".($_page+1).">[下页]</a>  <a href=?page=$_pagecount>[末页]</a>";
                    }
                ?>&nbsp;
                <form action="">
                    <input type="text" id="select" size="1" maxlength="3">
                    <input type="button" style="cursor:pointer" value="跳转" onclick="goto()" />
                </form>
                </span>
            </div>
    </div><!-- end of right content -->
<?php
    }
    if ($_answer=='m2') {
?>

    <div class="right_content">
    <a href="#nogo" class="bt_green"><span class="bt_green_lft"></span><strong>发布消息</strong><span class="bt_green_r"></span></a>

        <div class="form">
        <form action="message_check.php" method="post" name="niceform" class="niceform" enctype="multipart/form-data" onsubmit="checkupload()">

                <fieldset>
                    <dl>
                        <dt><label for="title">标题:</label></dt>
                        <dd><input type="text" name="title" id="title" size="32" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="comments">内容:</label></dt>
                        <dd><textarea name="comments" id="comments" rows="6" cols="38"></textarea></dd>
                    </dl>

                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="发布" />
                     </dl>

                </fieldset>

        </form>
        </div>

    </div><!-- end of right content -->
<?php
    }
?>
<?php
    if ($_answer=='m3') {
?>
        <div class="right_content">
            <a href="#nogo" class="bt_green"><span class="bt_green_lft"></span><strong>意见箱</strong><span class="bt_green_r"></span></a>


        </div><!-- end of right content -->
<?php
    }
?>




</div>  <!--end of center content -->

    <div class="clear"></div>
    </div> <!--end of main content-->

</div>
</body>
</html>