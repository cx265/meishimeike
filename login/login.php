<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>每十云课堂</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../assets/ico/1.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <script type="text/javascript" src="./js/login.js"></script>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>《<span>每十云课堂</span>》</h1>
            </header>
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="login_ckeck.php" method="post" autocomplete="off"> 
                                <h1>登录</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > 用户名 </label>
                                    <input maxlength="10" id="username" name="username" required="required" type="text" placeholder="用户名2-10个字符"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> 密码 </label>
                                    <input maxlength="16" id="password" name="password" required="required" type="password" placeholder="密码5-16个字符" /> 
                                </p>
                                <p>
                                    <label  for="code" class="youcode" data-icon="e">验证码：</label><br>
                                    <input style="width:60%" type="text" name="code" required="required" id="code" maxlength="4" placeholder="4个字符">
                                    <img name="change_pic" id="change_pic" src="../admin/code.php" style="cursor:pointer" onclick="change()"/>
                                    <a href="javascript:;" onclick="change()">换一张</a>
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label style="font-family:'微软雅黑',Arial,sans-serif;" for="loginkeeping">记住我</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" value="登录" />
								</p>
                                <p class="change_link">
									<a href="../index.php" > 暂不登录 </a> 还没有账号 ?
									<a href="#toregister" class="to_register">注册</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="registration_ckeck.php" autocomplete="off" method="post"> 
                                <h1> 注册 </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">用户名</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > 邮箱</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder=""/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">密码 </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" maxlength="16" placeholder=""/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">确认密码 </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" maxlength="16" placeholder=""/>
                                </p>
                                <p>
                                    <label  for="code" class="youcode" data-icon="e">验证码：</label><br>
                                    <input style="width:60%" type="text" name="code" required="required" id="code" maxlength="4" placeholder="4个字符">
                                    <img name="change_pic" id="change_pic" src="../admin/code.php" style="cursor:pointer" onclick="change()"/>
                                    <a href="javascript:;" onclick="change()">换一张</a>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="注册"/> 
								</p>
                                <p class="change_link">  
									<a href="../index.php" > 暂不注册 </a> 已有账号 ?
									<a href="#tologin" class="to_register"> 到登录页面 </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>