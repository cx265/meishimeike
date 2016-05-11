<?php
    error_reporting(0);
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
<script language="javascript" type="text/javascript" src="js/item.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />
<link rel="stylesheet" type="text/css" media="all" href="./css/class.css" />
<script language="javascript" type="text/javascript" src="js/class.js"></script>
<script language="javascript" type="text/javascript" src="js/select.js"></script>

</head>
<body>
<div id="main_container">

	<div class="header">
    <div class="logo"><a href="#"><img src="../images/logo.png" alt="" title="" border="0" /></a></div>

    <div class="right_header">欢迎您,管理员 <a href="index.php">首站</a> | <a href="#" class="messages">(3) 新消息</a> | <a href="loginout.php" class="logout">退出</a></div>
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
                    <li><a class="current"  href="./MicorClass.php?answer=c1">微课管理<!--[if IE 7]><!--></a><!--<![endif]-->
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

				<a class="menuitem" href="./MicorClass.php?answer=c1">微课审阅</a>
                <a class="menuitem" href="./MicorClass.php?answer=c2">微课发布</a>
                <a class="menuitem" href="./MicorClass.php?answer=c3">微课评价</a>
                <a class="menuitem" href="./MicorClass.php?answer=c4">微课分类</a>
                <a class="menuitem" href="./MicorClass.php?answer=c5">分类管理</a>

                <div class="sidebar_box">
                    <div class="sidebar_box_top"></div>
                    <div class="sidebar_box_content">
                    <h3>操作简介</h3>
                    <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
                    <ul>
                    <li><strong>微课审阅:</strong><br />对上传的微课进行相关的审核、批准、删除!</li>
                    <li><strong>微课发布:</strong><br />上传你的微课视频供大家一起分享,学习!</li>
                    <li><strong>微课评价:</strong><br />对微课的相关评价进行审核、修改、删除!</li>
                    <li><strong>微课分类:</strong><br />对微课进行分类查找!</li>
                    <li><strong>分类管理:</strong><br />对微课进行分类,管理微课的种类并进行修改、删除!</li>
                    </ul>
                    </div>
                    <div class="sidebar_box_bottom"></div>
                </div>

            </div>
    </div>
<?php
    if ($_answer=='c1' || !isset($_answer)) {
        $_pagesize = 5;
        $_result = mysql_query("SELECT * FROM video");
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
        $_result = mysql_query("SELECT * FROM video ORDER BY id DESC LIMIT $_start,$_pagesize");
?>
    <div class="right_content">

    <a href="#nogo" class="bt_green"><span class="bt_green_lft"></span><strong>微课审阅</strong><span class="bt_green_r"></span></a>

    <div class="form">
            <form action="" method="post" name="niceform" class="niceform" enctype="multipart/form-data">
                <fieldset>
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <td class="checkbox"><input onclick="checkall()" type="checkbox"   name="allcheck" id="allcheck"/></td>
                                <td>微课视频</td>
                                <td>上传者</td>
                                <td>审阅</td>
                                <td>上传时间</td>
                                <td>操作</td>
                            </tr>
                        </thead>
                        <tbody>
        <?php
            while($_rows = mysql_fetch_array($_result)){
        ?>
                            <tr class="hover">
                                <td class="checkbox"><input type="checkbox" name="checkbox"/></td>
                                <td><a href="video_check.php?id=<?php echo($_rows['id']) ;?>" target="_blank"><?php echo($_rows['theme']);?></a></td>
                                <td><?php echo($_rows['video_uploader']);?></td>
                                <td>
                                    <?php if ($_rows['status']==1) echo "<a href=class_edit.php?page=".$_page."&status=1&id=".$_rows['id'].">已审核</a>";
                                    else echo "<a class='red' href=class_edit.php?page=".$_page."&status=0&id=".$_rows['id'].">未审核</a>";?>
                                </td>
                                <td><?php echo($_rows['video_time']);?></td>
                                <td>&nbsp;&nbsp;
                                    <span>
                                        [ <a href="class_update.php?A=1&page=<?php echo ($_page)?>&id=<?php echo($_rows['id'])?>">修改</a> ]
                                    </span>
                                    <span>
                                        [ <a href="class_delete.php?A=1&page=<?php echo ($_page)?>&id=<?php echo($_rows['id'])?>">删除</a> ]
                                    </span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>
                                        [ <a href="subject.php?answer=s2&id=<?php echo($_rows['id'])?>">添加试题</a> ]
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
                        echo "[首页]  [上页]  <a href=?answer=c1&page=".($_page+1).">[下页]</a>  <a href=?answer=c1&page=$_pagecount>[末页]</a>";
                    }
                    else if($_page == $_pagecount){
                        echo "<a href=?answer=c1&page=1>[首页]</a>  <a href=?answer=c1&page=".($_page-1).">[上页]</a>  [下页]  [末页]";
                    }
                    else{
                        echo "<a href=?answer=c1&page=1>[首页]</a>  <a href=?answer=c1&page=".($_page-1).">[上页]</a>  <a href=?answer=c1&page=".($_page+1).">[下页]</a>  <a href=?answer=c1&page=$_pagecount>[末页]</a>";
                    }
                ?>&nbsp;
                <form action="">
                    <input type="text" id="select" size="1" maxlength="3">
                    <input type="button" style="cursor:pointer" value="跳转" onclick="goto_c1()" />
                </form>
                </span>
            </div>
    </div><!-- end of right content-->

<?PHP
    }if($_answer=='c2'){
?>
    <div class="right_content">

	<a href="#nogo" class="bt_green"><span class="bt_green_lft"></span><strong>微课发布</strong><span class="bt_green_r"></span></a>

		<div class="form">
        <form action="upload_check.php" method="post" name="niceform" class="niceform" enctype="multipart/form-data" onsubmit="checkupload()">
                <fieldset>
                    <dl>
                        <dt><label for="color">微课分类</label></dt>
                        <dd>
                            前端:<input type="radio" name="type" id="fore_end_HTML" value="HTML" checked="checked"/><label class="check_label" for="fore_end_HTML">HTML</label>
                            <input type="radio" name="type" id="fore_end_CSS" value="CSS"/><label class="check_label" for="fore_end_CSS">CSS</label>
                            <input type="radio" name="type" id="fore_end_javascript" value="javascript"/><label class="check_label" for="fore_end_javascript">javascript</label>
                            <input type="radio" name="type" id="fore_end_jQuery" value="jQuery"/><label class="check_label" for="fore_end_jQuery">jQuery</label>
                            <input type="radio" name="type" id="fore_end_Ajax" value="Ajax"/><label class="check_label" for="fore_end_Ajax">Ajax</label>
                        </dd>
                        <dd>
                            后端:<input type="radio" name="type" id="after_end_PHP" value="PHP" /><label class="check_label" for="after_end_PHP">PHP</label>
                            <input type="radio" name="type" id="after_end_MySQL" value="MySQL"/><label class="check_label" for="after_end_MySQL">MySQL</label>
                            <input type="radio" name="type" id="after_end_ASP" value="ASP"/><label class="check_label" for="after_end_ASP">ASP</label>
                            <input type="radio" name="type" id="after_end_Java" value="Java"/><label class="check_label" for="after_end_Java">Java</label>
                        </dd>
                    </dl>
                    <dl>
                        <dt><label for="upload">上传视频:</label></dt>
                        <dd><input type="file" name="upload" id="upload" />
                        	<input type="hidden" name="MAX_FILE_SIZE" value="5001024000"></dd>
                    </dl>
                    <dl>
                        <dt><label for="img">视频图片:</label></dt>
                        <dd><input type="file" name="img" id="img" />
                            <input type="hidden" name="MAX_FILE_SIZE" value="21024000"></dd>
                    </dl>
                    <dl>
                        <dt><label for="comments">视频简介:</label></dt>
                        <dd><textarea name="comments" id="comments" rows="6" cols="38"></textarea></dd>
                    </dl>
                    <dl>
                        <dd>
                            <input type="checkbox" checked="checked" name="interests[]" id="agree" value="" /><label class="check_label" for="agree">我已阅读并同意 <a href="javascript:void(0);" onclick="cont_show()" id="show">《条款 &amp; 协议》</a></label>
                            <div id="cont_box" class="cont_box">
                                <p>在本网站上传视频是完全免费的，继续上传前请先阅读服务条款：
                                用户单独承担发布内容的责任。用户对服务的使用是根据所有适用于服务的地方法律、国家法律和国际法律标准的。
                                用户承诺：</p>
                                <p>一、在本站的网页上发布信息或者利用本站的服务时必须符合中国有关法规，不得在本站的网页上或者利用本站的服务制作、复制、发布、传播以下信息：</p>
                                <p>1) 反对宪法所确定的基本原则的；</p>
                                <p>2) 危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；</p>
                                <p>3) 损害国家荣誉和利益的；</p>
                                <p>4) 煽动民族仇恨、民族歧视，破坏民族团结的；</p>
                                <p>5) 破坏国家宗教政策，宣扬邪教和封建迷信的；</p>
                                <p>6) 散布谣言，扰乱社会秩序，破坏社会稳定的；</p>
                                <p>7) 散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的；</p>
                                <p>8) 侮辱或者诽谤他人，侵害他人合法权益的；</p>
                                <p>9) 含有法律、行政法规禁止的其他内容的。</p>
                                <p>二、在本站的网页上发布信息或者利用本站的服务时还必须符合其他有关国家和地区的法律规定以及国际法的有关规定。</p>
                                <p>三、不利用本站的服务从事以下活动：</p>
                                <p>1) 未经允许，进入计算机信息网络或者使用计算机信息网络资源的；</p>
                                <p>2) 未经允许，对计算机信息网络功能进行删除、修改或者增加的；</p>
                                <p>3) 未经允许，对进入计算机信息网络中存储、处理或者传输的数据和应用程序进行删除、修改或者增加的；</p>
                                <p>4) 故意制作、传播计算机病毒等破坏性程序的；</p>
                                <p>5) 其他危害计算机信息网络安全的行为。</p>
                                <p class="cont_state">声明：本网站的所有权、服务条款的解释权归网站开发组所有。</p>
                            </div>
                        </dd>
                    </dl>
                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="提交" />
                     </dl>
                </fieldset>
        </form>
        </div>
     </div><!-- end of right content-->
<?php
    }if($_answer=='c3'){
?>


<?php
    }if($_answer=='c4'){
        $_pagesize = 5;
        $_type = $_GET['type'];
        if ($_type=="") {
            $_result = mysql_query("SELECT * FROM video");
        }
        else{
            $_result = mysql_query("SELECT * FROM video WHERE video_type LIKE '$_type'");
        }
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
        if ($_type=="" || !isset($_type)) {
            $_result = mysql_query("SELECT * FROM video ORDER BY id DESC LIMIT $_start,$_pagesize");
        }
        else{
            $_result = mysql_query("SELECT * FROM video WHERE video_type LIKE '$_type' ORDER BY id DESC LIMIT $_start,$_pagesize");
        }
?>
        <div class="right_content">
        <a href="#nogo" class="bt_green"><span class="bt_green_lft"></span><strong>微课分类</strong><span class="bt_green_r"></span></a>
        <form action="select.php?type=<?php echo"$_type"?>" method="post" name="niceform" class="" enctype="multipart/form-data">
            <dl>
                <dd class="select">
                <select name="small_sort1" class="small_fore">
                    <option value="">请选择</option>
                    <option value="HTML">HTML</option>
                    <option value="CSS">CSS</option>
                    <option value="javascript">javascript</option>
                    <option value="jQuery">jQuery</option>
                    <option value="Ajax">Ajax</option>
                </select>
                <select name="small_sort2" class="small_after">
                    <option value="">请选择</option>
                    <option value="PHP">PHP</option>
                    <option value="MySQL">MySQL</option>
                    <option value="ASP">ASP</option>
                    <option value="Java">Java</option>
                </select>
                <select name="big_sort" id="big_sort">
                    <option value="">请选择</option>
                    <option value="fore_end">前端</option>
                    <option value="after_end">后台</option>
                    <option value="other">其他</option>
                </select>
                </dd>
            </dl>
                    <input type="submit" name="submit" class="select" value="查询" />
                    <input type="hidden" id="type_hide" value="<?php echo($_type);?>" />
        </form>
            <div class="form">
            <form action="" method="post" name="niceform" class="niceform" enctype="multipart/form-data">

                <fieldset>
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <td class="checkbox"><input onclick="checkall()" type="checkbox"   name="allcheck" id="allcheck"/></td>
                                <td>微课视频</td>
                                <td>微课分类</td>
                                <td>上传者</td>
                                <td>上传时间</td>
                                <td>操作</td>
                            </tr>
                        </thead>
                        <tbody>
        <?php
            while($_rows = mysql_fetch_array($_result)){
        ?>
                            <tr class="hover">
                                <td class="checkbox"><input type="checkbox" name="checkbox"/></td>
                                <td><?php echo($_rows['theme']);?></td>
                                <td><?php echo($_rows['video_type']);?></td>
                                <td><?php echo($_rows['video_uploader']);?></td>
                                <td><?php echo($_rows['video_time']);?></td>
                                <td>
                                    <span>
                                        [ <a href="class_update.php?page=<?php echo ($_page)?>&id=<?php echo($_rows['id'])?>">修改</a> ]
                                    </span>
                                    <span>
                                        [ <a href="class_delete.php?page=<?php echo ($_page)?>&id=<?php echo($_rows['id'])?>">删除</a> ]
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
                        echo "[首页]  [上页]  <a href=?answer=c4&type=".$_type."&page=".($_page+1).">[下页]</a>  <a href=?answer=c4&type=".$_type."&page=$_pagecount>[末页]</a>";
                    }
                    else if($_page == $_pagecount){
                        echo "<a href=?answer=c4&type=".$_type."&page=1>[首页]</a>  <a href=?answer=c4&type=".$_type."&page=".($_page-1).">[上页]</a>  [下页]  [末页]";
                    }
                    else{
                        echo "<a href=?answer=c4&type=".$_type."&page=1>[首页]</a>  <a href=?answer=c4&type=".$_type."&page=".($_page-1).">[上页]</a>  <a href=?answer=c4&type=".$_type."&page=".($_page+1).">[下页]</a>  <a href=?answer=c4&type=".$_type."&page=$_pagecount>[末页]</a>";
                    }
                ?>&nbsp;
                <form action="">
                    <input type="text" id="select" size="1" maxlength="3">
                    <input type="button" style="cursor:pointer" value="跳转" onclick="goto_c4()" />
                </form>
                </span>
            </div>

    </div><!-- end of right content-->
<?php
    }if($_answer=='c5'){
?>
        <div class="right_content">
        <a href="#nogo" class="bt_green"><span class="bt_green_lft"></span><strong>分类管理</strong><span class="bt_green_r"></span></a>
                <?php
                include("./sort_manage.php");
                ?>
    </div><!-- end of right content-->
<?php
    }
?>
  </div>   <!--end of center content -->

    <div class="clear"></div>
    </div> <!--end of main content-->

</div>
</body>
</html>