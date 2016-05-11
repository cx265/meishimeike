<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员登录界面</title>
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

<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">

	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
    function change(){
        var change=document.getElementById('change_pic');
        change.src="code.php?"+Math.random();
    }
    window.onload = function(){
    	var textBox = document.getElementById("code");
    	textBox.onkeyup = function(){
    	this.value = this.value.toUpperCase();
	};
};
</script>
<script type="text/javascript">
    function checkpost(){
        if (login.username.value=="")
        {
            alert("请输入用户名！");
            login.username.focus();
            return false;
        }
        if (login.password.value=="")
        {
            alert("请输入密码！");
            login.password.focus();
            return false;
        }
        if (login.code.value=="")
        {
            alert("请输入验证码！");
            login.code.focus();
            return false;
        }
        return true;
</script>
<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />

</head>
<body>
<div id="main_container">

	<div class="header_login">
    <div class="logo"><a href="../index.php"><img src="../images/logo.png" alt="" title="" border="0" /></a></div>

    </div>
         <div class="login_form">
         <h3>管理员登录界面</h3>
         <a href="#" class="forgot_pass">忘记密码</a>

         <form action="login_check.php" name="login" method="post" class="niceform" autocomplete="off" onsubmit="return checkpost()">

                <fieldset>
                    <dl>
                        <dt><label for="username">用户名:</label></dt>
                        <dd><input type="text" name="username" id="username" size="44" maxlength="10" placeholder="支持用户名 / 昵称" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="password">密码:</label></dt>
                        <dd><input type="password" name="password" id="password" size="44" maxlength="16" placeholder="输入密码" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="code">验证码:</label></dt>
                        <dd><input type="text" name="code" id="code" size="8" maxlength="4" placeholder="输入验证码" />
                            <img name="change_pic" id="change_pic" src="code.php" style="vertical-align:middle;cursor:pointer" onclick="change()"/>
                            <span class="change" onclick="change()">看不清,换一张</span>
                        </dd>
                    </dl>
                    <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="登录" />
                    <input type="reset" name="reset" id="reset" value="重置" />
                    </dl>
                </fieldset>
         </form>
         </div>
    <div class="footer_login" style="display:none;">
    	<div class="left_footer_login" style="color:#59C3EE">IN ADMIN PANEL <strong style="color:white">|</strong> Powered by <a href="#">shadow.com</a></div>
    	<div class="right_footer_login"></div>
    </div>
</div>
</body>
</html>