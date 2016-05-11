<?php
    session_start();
    header("Content-Type:text/html; charset=utf-8");
    if (!isset($_COOKIE['user'])||$_COOKIE['user']!='admin') {
        echo "<script language='javascript'>alert('您不是管理员!无法登录后台管理系统!');
        window.location='login.php'</script>";
    }else
    $_answer = $_GET['answer'];
    require("connect.php");
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
<link rel="stylesheet" type="text/css" href="./css/users.css" />
<script type="text/javascript" src="./js/users.js"></script>
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
                    <li><a class="current" href="./users.php?answer=u1">用户管理<!--[if IE 7]><!--></a><!--<![endif]-->
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

		<div class="sidebarmenu">

			<a class="menuitem" href="./users.php?answer=u1">注册用户</a>
            <a class="menuitem" href="./users.php?answer=u2">小组管理</a>
			<a class="menuitem" href="./users.php?answer=u3">名师风采</a>

        </div>

        <div class="sidebar_box">
            <div class="sidebar_box_top"></div>
            <div class="sidebar_box_content">
            <h3>操作简介</h3>
            <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
            <ul>
            <li><strong>注册用户:</strong><br />对注册的用户进行信息的核实、修改、删除!</li>
            <li><strong>小组管理:</strong><br />管理讨论组，合理安排先关学习组成员的学习进度!</li>
            <li><strong>名师风采:</strong><br />对优秀讲师进行介绍、推荐，管理员对名师进行信息的添加、修改、删除!</li>
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
    if ($_answer=='u1' || !isset($_answer)) {
        $_pagesize = 5;
        $_result = mysql_query("SELECT * FROM user");
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
        $_result = mysql_query("SELECT * FROM user ORDER BY id DESC LIMIT $_start,$_pagesize");
?>
    <div class="right_content">
    <div>
		<a href="#nogo" class="bt_green"><span class="bt_green_lft"></span><strong>注册用户</strong><span class="bt_green_r"></span></a>

			<div class="form">
	        <form action="" method="post" name="niceform" class="niceform" enctype="multipart/form-data" autocomplete="off">

                <fieldset>
                	<table cellspacing="0">
                		<thead>

							<tr>
								<td class="checkbox"><input onclick="checkall()" type="checkbox"   name="allcheck" id="allcheck"/></td>
								<td>头像</td>
								<td>昵称</td>
								<td>积分</td>
								<td>用户权限</td>
								<td>审核</td>
								<td>操作</td>
							</tr>

						</thead>
						<tbody>
		<?php
			while($_rows = mysql_fetch_array($_result)){
                if ($_rows['face']=="") {
                    $_face = "default.jpg";
                }else{
                    $_face = $_rows['face'];
                }
		?>
							<tr class="hover">
								<td class="checkbox"><input type="checkbox" name="checkbox"/></td>
								<td><img class="face" src="./images/userface/<?php echo ($_face);?>"/></td>
								<td><?php echo($_rows['nickname']);?></td>
								<td><?php echo($_rows['integral']);?></td>
								<td><?php echo($_rows['rank']);?></td>
								<td>
									<?php if ($_rows['status']==1) echo "<a href=users_edit.php?page=".$_page."&status=1&id=".$_rows['id'].">已审核</a>";
									else echo "<a class='red' href=users_edit.php?page=".$_page."&status=0&id=".$_rows['id'].">未审核</a>";?>
								</td>
								<td>
									<span>
										[ <a href="users_update.php?page=<?php echo ($_page)?>&id=<?php echo($_rows['id'])?>">修改</a> ]
									</span>
									<span>
										[ <a href="users_delete.php?page=<?php echo ($_page)?>&id=<?php echo($_rows['id'])?>">删除</a> ]
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
				共有<span class="num">[<?php echo $_recordcount;?>]</span>条信息 分<span class="num"><?php echo $_pagecount;?></span>页 <span class="num"><?php echo $_pagesize;?></span>条/页	当前<span class="nowpage">第<?php echo $_page;?>页</span>&nbsp;
				<?php
                    if ($_pagecount == 1) {
                        echo "[首页]  [上页]  [下页]  [末页]";
                    }
                    else if($_page == 1){
						echo "[首页]  [上页]  <a href=?answer=u1&page=".($_page+1).">[下页]</a>  <a href=?answer=u1&page=$_pagecount>[末页]</a>";
					}
					else if($_page == $_pagecount){
						echo "<a href=?answer=u1&page=1>[首页]</a>  <a href=?answer=u1&page=".($_page-1).">[上页]</a>  [下页]  [末页]";
					}
					else{
						echo "<a href=?answer=u1&page=1>[首页]</a>  <a href=?answer=u1&page=".($_page-1).">[上页]</a>  <a href=?answer=u1&page=".($_page+1).">[下页]</a>  <a href=?answer=u1&page=$_pagecount>[末页]</a>";
					}
				?>&nbsp;
				<form action="">
					<input type="text" id="select" size="1" maxlength="3">
					<input type="button" style="cursor:pointer" value="跳转" onclick="goto_u1()" />
				</form>
				</span>
			</div>
		</div><!-- end of right content-->
<?php
	}if ($_answer=='u2') {
        $_pagesize = 5;
        $_result = mysql_query("SELECT * FROM groups");
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
        $_result = mysql_query("SELECT * FROM groups ORDER BY id DESC LIMIT $_start,$_pagesize");
?>
    <div class="right_content">
        <a href="#nogo" class="bt_green"><span class="bt_green_lft"></span><strong>小组管理</strong><span class="bt_green_r"></span></a>

            <div class="form">
            <form action="" method="post" name="niceform" class="niceform" enctype="multipart/form-data" autocomplete="off">
                <fieldset>
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <td class="checkbox"><input onclick="checkall()" type="checkbox"   name="allcheck" id="allcheck"/></td>
                                <td>小组图标</td>
                                <td>组名</td>
                                <td>组长</td>
                                <td>讨论话题</td>
                                <td>操作</td>
                            </tr>
                        </thead>
                        <tbody>
        <?php
            while($_rows = mysql_fetch_array($_result)){
                if ($_rows['group_img']=="") {
                    $_face = "default.jpg";
                }else{
                    $_face = $_rows['group_img'];
                }
                $_name_id = $_rows['group_leader'];
                $_a = mysql_query("SELECT * FROM user WHERE id='$_name_id' LIMIT 1");
                $_b = mysql_fetch_array($_a);
                $_c = $_b['nickname'];

        ?>
                            <tr class="hover">
                                <td class="checkbox"><input type="checkbox" name="checkbox"/></td>
                                <td><img class="face" src="./images/groupface/<?php echo ($_face);?>"/></td>
                                <td><?php echo($_rows['group_name']);?></td>
                                <td><?php echo($_c);?></td>
                                <td><?php echo($_rows['title']);?></td>
                                <td>
                                    <span>
                                        [ <a href="group_update.php?page=<?php echo ($_page)?>&id=<?php echo($_rows['id'])?>">修改</a> ]
                                    </span>
                                    <span>
                                        [ <a href="group_delete.php?page=<?php echo ($_page)?>&id=<?php echo($_rows['id'])?>">删除</a> ]
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

            <div class="paging">
                <span>
                共有<span class="num">[<?php echo $_recordcount;?>]</span>条信息 分<span class="num"><?php echo $_pagecount;?></span>页 <span class="num"><?php echo $_pagesize;?></span>条/页   当前<span class="nowpage">第<?php echo $_page;?>页</span>&nbsp;
                <?php
                    if ($_pagecount == 1) {
                        echo "[首页]  [上页]  [下页]  [末页]";
                    }
                    else if($_page == 1){
                        echo "[首页]  [上页]  <a href=?answer=u2&page=".($_page+1).">[下页]</a>  <a href=?answer=u2&page=$_pagecount>[末页]</a>";
                    }
                    else if($_page == $_pagecount){
                        echo "<a href=?answer=u2&page=1>[首页]</a>  <a href=?answer=u2&page=".($_page-1).">[上页]</a>  [下页]  [末页]";
                    }
                    else{
                        echo "<a href=?answer=u2&page=1>[首页]</a>  <a href=?answer=u2&page=".($_page-1).">[上页]</a>  <a href=?answer=u2&page=".($_page+1).">[下页]</a>  <a href=?answer=u2&page=$_pagecount>[末页]</a>";
                    }
                ?>&nbsp;
                <form action="">
                    <input type="text" id="select" size="1" maxlength="3">
                    <input type="button" style="cursor:pointer" value="跳转" onclick="goto_u2()" />
                </form>
                </span>
            </div>
    </div><!-- end of right content-->
<?php
	}if ($_answer=='u3') {
        $_pagesize = 5;
        $_result = mysql_query("SELECT * FROM teacher");
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
        $_result = mysql_query("SELECT * FROM teacher ORDER BY id DESC LIMIT $_start,$_pagesize");
?>
    <div class="right_content">
        <a href="#nogo" class="bt_green"><span class="bt_green_lft"></span><strong>名师风采</strong><span class="bt_green_r"></span></a>
            <div class="form">
            <form action="" method="post" name="niceform" class="niceform" enctype="multipart/form-data">
                <fieldset>
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <td class="checkbox"><input onclick="checkall()" type="checkbox"   name="allcheck" id="allcheck"/></td>
                                <td>教师照片</td>
                                <td>姓名</td>
                                <td>学历</td>
                                <td>职称</td>
                                <td>操作</td>
                            </tr>
                        </thead>
                        <tbody>
        <?php
            while($_rows = mysql_fetch_array($_result)){
                if ($_rows['teacher_face']=="") {
                    $_face = "default.jpg";
                }else{
                    $_face = $_rows['teacher_face'];
                }
        ?>
                            <tr class="hover">
                                <td class="checkbox"><input type="checkbox" name="checkbox"/></td>
                                <td><img class="face" src="./images/teacherface/<?php echo ($_face);?>"/></td>
                                <td><?php echo($_rows['teacher_name']);?></td>
                                <td><?php echo($_rows['teacher_degree']);?></td>
                                <td><?php echo($_rows['teacher_occupation']);?></td>
                                <td>
                                    <span>
                                        [ <a href="teacher_update.php?page=<?php echo ($_page)?>&id=<?php echo($_rows['id'])?>">修改</a> ]
                                    </span>
                                    <span>
                                        [ <a href="teacher_delete.php?page=<?php echo ($_page)?>&id=<?php echo($_rows['id'])?>">删除</a> ]
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
            <div class="paging">
                <span>
                共有<span class="num">[<?php echo $_recordcount;?>]</span>条信息 分<span class="num"><?php echo $_pagecount;?></span>页 <span class="num"><?php echo $_pagesize;?></span>条/页   当前<span class="nowpage">第<?php echo $_page;?>页</span>&nbsp;
                <?php
                    if ($_pagecount == 1) {
                        echo "[首页]  [上页]  [下页]  [末页]";
                    }
                    else if($_page == 1){
                        echo "[首页]  [上页]  <a href=?answer=u3&page=".($_page+1).">[下页]</a>  <a href=?answer=u3&page=$_pagecount>[末页]</a>";
                    }
                    else if($_page == $_pagecount){
                        echo "<a href=?answer=u3&page=1>[首页]</a>  <a href=?answer=u3&page=".($_page-1).">[上页]</a>  [下页]  [末页]";
                    }
                    else{
                        echo "<a href=?answer=u3&page=1>[首页]</a>  <a href=?answer=u3&page=".($_page-1).">[上页]</a>  <a href=?answer=u3&page=".($_page+1).">[下页]</a>  <a href=?answer=u3&page=$_pagecount>[末页]</a>";
                    }
                ?>&nbsp;
                <form action="">
                    <input type="text" id="select" size="1" maxlength="3">
                    <input type="button" style="cursor:pointer" value="跳转" onclick="goto_u3()" />
                </form>
                </span>
            </div>
    </div><!-- end of right content-->
<?php
    }
?>

</div>  <!--end of center content -->

    <div class="clear"></div>
    </div> <!--end of main content-->

</div>
</body>
</html>