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
    $_result = mysql_query("SELECT * FROM user WHERE id='$_id' LIMIT 1");
    $_rows = mysql_fetch_array($_result);
    if ($_rows['face']=="") {
        $_face = "default.jpg";
    }else{
        $_face = $_rows['face'];
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
    $('#example_1').datetimepicker();
    $('#example_2').timepicker({});
    $('#example_3').datetimepicker({
        showSecond: true,
        showMillisec: true,
        timeFormat: 'hh:mm:ss'
    });
    $('#example').datetimepicker({
        showSecond: true,
        showMillisec: true,
        timeFormat: 'hh:mm:ss'
    });
    $('#example_4').timepicker({
        ampm: true,
        hourMin: 8,
        hourMax: 16
    });
    $('#example_5').datetimepicker({
       hour: 13,
       minute: 15
    });
    $('#example_6').datetimepicker({
       numberOfMonths: 2,
       minDate: 0,
       maxDate: 30
    });
    $('#example_7').timepicker({
       hourGrid: 4,
       minuteGrid: 10
    });

    var ex8 = $('#example_8');

      ex8.datetimepicker();

      $('#example_8_set_btn').click(function(){
          ex8.datetimepicker('setDate', (new Date()) );
      });

      $('#example_8_get_btn').click(function(){
           alert(ex8.datetimepicker('getDate'));
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
<!-- 生日时间 -->
<link type="text/css" rel="stylesheet" href="./css/calendar.css" >
<script type="text/javascript" src="./js/calendar.js" charset="gb2312"></script>
<script type="text/javascript" src="./js/calendar-zh.js" charset="gb2312"></script>
<script type="text/javascript" src="./js/calendar-setup.js" charset="gb2312"></script>
<!-- 注册/登录时间 -->
<link rel="stylesheet" type="text/css" href="./css/jquery-ui.css" />
<script type="text/javascript" src="./js/jquery-ui-slide.min.js"></script>
<script type="text/javascript" src="./js/jquery-ui.js"></script>
<script type="text/javascript" src="./js/jquery-ui-timepicker-addon.js"></script>

<link rel="stylesheet" type="text/css" href="css/users_update.css" />

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
            <a class="menuitem" href="./users.php?answer=u2">用户权限</a>
			<a class="menuitem" href="./users.php?answer=u3">用户评论</a>
            <a class="menuitem" href="./users.php?answer=u4">用户收藏</a>

        </div>

        <div class="sidebar_box">
            <div class="sidebar_box_top"></div>
            <div class="sidebar_box_content">
            <h3>操作简介</h3>
            <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
            <ul>
            <li><strong>注册用户:</strong><br />对注册的用户进行信息的核实、修改、删除!</li>
            <li><strong>用户权限:</strong><br />更改用户的权限(初级会员 、 中级会员 、 高级会员 、 管理员)</li>
            <li><strong>名师风采:</strong><br />对用户收藏的微课进行分类、修改、删除!</li>
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
		<a href="#nogo" class="bt_green"><span class="bt_green_lft"></span><strong>用户信息编辑</strong><span class="bt_green_r"></span></a>
        <a style="cursor:pointer;margin-left:390px;" onmouseover="this.style.cssText='cursor:pointer;color:#FCD209; text-decoration:underline;margin-left:390px;'" onmouseout="this.style.cssText='color:white;text-decoration:none;margin-left:390px;'" href="users.php?answer=u1&page=<?php echo($_page) ?>" class="bt_green"><span class="bt_green_lft"></span><strong>返回《《</strong><span class="bt_green_r"></span></a>

            <div class="form">
            <form action="users_update_save.php?id=<?php echo($_id) ?>&page=<?php echo($_page) ?>" method="post" name="niceform" class="niceform" enctype="multipart/form-data">

            <fieldset>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_table">
                <tr>
                    <td width="25%" height="35" align="right">用户名:</td>
                    <td width="75%"><input type="text" name="truename" value="<?php echo $_rows['truename']; ?>"/></td>
                </tr>
                <tr>
                    <td height="35" align="right">密　码:</td>
                    <td><input name="password" type="password" id="password" value="" class="class_input" maxlength="16" />
                        <span class="maroon">*</span> (6-16位数字或字符) <span class="cnote">若不修改请留空</span></td>
                </tr>
                <tr>
                    <td height="35" align="right">确　认:</td>
                    <td><input name="repassword" type="password" id="repassword" value="" class="class_input" maxlength="16" />
                        <span class="maroon">*</span> (6-16位数字或字符) <span class="cnote">若不修改请留空</span></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">昵　称:</td>
                    <td width="75%"><input type="text" name="nickname" value="<?php echo $_rows['nickname']; ?>"/></td>
                </tr>
                <tr>
                    <td height="100" align="right">头　像:</td>
                    <td><img class="face" src="./images/userface/<?php echo $_face ?>" /></td>
                </tr>
                <tr>
                    <td height="35" align="right">性　别:</td>
                    <td><input name="sex" type="radio" value="男" id="nan" <?php if($_rows['sex'] == "男") echo 'checked="checked"';?> />
                        &nbsp;<label for="nan">男</label>
                        <input name="sex" type="radio" value="女" id="nv" <?php if($_rows['sex'] == "女") echo 'checked="checked"'; ?> />
                        &nbsp;<label for="nv">女</label></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">生　日:</td>
                    <td width="75%"><input type="text" name="birth" readonly="readonly" id="EntTime" value="<?php echo $_rows['birth'];?>" onclick="return showCalendar('EntTime', 'y-mm-dd');"/></td>
                </tr>
                <tr>
                    <td height="35" align="right">权　限:</td>
                    <td><select name="rank" id="rank">
                        <?php
                            if ($_rows['rank']=="初级会员"){
                                echo(
                                "<option value='初级会员' selected='selected'>初级会员</option>
                                <option value='中级会员'>中级会员</option>
                                <option value='高级会员'>高级会员</option>
                                <option value='管理员'>管理员</option>"
                                );
                            }
                            if ($_rows['rank']=="中级会员"){
                                echo(
                                "<option value='初级会员'>初级会员</option>
                                <option value='中级会员' selected='selected'>中级会员</option>
                                <option value='高级会员'>高级会员</option>
                                <option value='管理员'>管理员</option>"
                                );
                            }
                            if ($_rows['rank']=="高级会员"){
                                echo(
                                "<option value='初级会员'>初级会员</option>
                                <option value='中级会员'>中级会员</option>
                                <option value='高级会员' selected='selected'>高级会员</option>
                                <option value='管理员'>管理员</option>"
                                );
                            }
                            if ($_rows['rank']=="管理员"){
                                echo(
                                "<option value='初级会员'>初级会员</option>
                                <option value='中级会员'>中级会员</option>
                                <option value='高级会员'>高级会员</option>
                                <option value='管理员' selected='selected'>管理员</option>"
                                );
                            }
                            if ($_rows['rank']==""){
                                echo(
                                "<option value='' selected='selected'>请选择</option>
                                <option value='初级会员'>初级会员</option>
                                <option value='中级会员'>中级会员</option>
                                <option value='高级会员'>高级会员</option>
                                <option value='管理员'>管理员</option>"
                                );
                            }
                        ?>
                        </select></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">积　分:</td>
                    <td width="75%"><input type="text" name="integral" value="<?php echo $_rows['integral']; ?>"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">邮　箱:</td>
                    <td width="75%"><input type="text" name="email" value="<?php echo $_rows['email']; ?>"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">电　话:</td>
                    <td width="75%"><input type="text" name="telephone" value="<?php echo $_rows['telephone']; ?>"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">QQ　:</td>
                    <td width="75%"><input type="text" name="qq" value="<?php echo $_rows['qq']; ?>"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">个人介绍:</td>
                    <td width="75%"><textarea name="introduce" cols="26" rows="6"><?php echo $_rows['introduce'];?></textarea></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">组　别:</td>
                    <td width="75%"><input type="text" name="groupid" value="<?php echo $_rows['groupid']; ?>"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">注册时间:</td>
                    <td width="75%"><input type="text" name="reg_time" value="<?php echo $_rows['reg_time']; ?>" id="example"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">登录时间:</td>
                    <td width="75%"><input type="text" name="logintime" value="<?php echo $_rows['logintime']; ?>" id="example_3"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">登录IP:</td>
                    <td width="75%"><input type="text" name="loginip" value="<?php echo $_rows['loginip']; ?>"/></td>
                </tr>
                <tr>
                    <td width="25%" height="35" align="right">审核:</td>
                    <td width="75%">&nbsp;&nbsp;&nbsp;
                        <?php if ($_rows['status']==1) echo "<a href=users_edit.php?A=1&page=".$_page."&status=1&id=".$_rows['id'].">已审核</a>";
                        else echo "<a style='color:red;' href=users_edit.php?A=1&page=".$_page."&status=0&id=".$_rows['id'].">未审核</a>";?></td>
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