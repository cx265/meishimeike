<?php
  session_start();
  require("./admin/connect.php");
  if (!isset($_SESSION['user'])) {
        echo "<script language='javascript'>alert('请先登录！');
        window.location.href='login/login.php#tologin'</script>";
        exit();
    }else
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>每十云课堂</title>

        <!-- CSS -->
        <link rel="stylesheet" href="assets/style.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/flexslider/flexslider.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/1.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
<!-- Top menu -->
        <nav class="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                        <span class="sr-only">每十云课堂</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php"><img src="images/logo2.png"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-home"></i><br>首页
                            </a>
                        </li>
                        <li>
                            <a href="portfolio.php"><i class="fa fa-camera"></i><br>微课天地</a>
                        </li>
                        <li>
                            <a href="mycourse.php"><i class="fa fa-tasks"></i><br>个人空间</a>
                        </li>
                        <li class="dropdown active">
                            <a href="services.php"><i class="fa fa-comments"></i><br>学习社区</a>
                        </li>
                        <li>
                            <a href="about.php"><i class="fa fa-user"></i><br>名师介绍</a>
                        </li>
                        <li>
                            <a href="login/login.php#toregister"><i class="fa fa-tags"></i><br>注册</a>
                        </li>
<?php
if (!isset($_SESSION['user'])) {
?>
                        <li>
                            <a href="login/login.php#tologin"><i class="fa fa-arrow-right"></i><br>登录</a>
                        </li>
<?php
}else{
?>
                        <li>
                            <a style="color:#FD8804;" href="#"><i class="fa fa-arrow-right"></i><br><?php echo($_SESSION['user']) ;?></a>
                        </li>
<?php
}
?>
                    </ul>
                </div>
            </div>
        </nav>

<!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-tasks"></i>
                        <h1>学习社区 /</h1>
                        <p style="font-family:'微软雅黑',Arial,sans-serif;">Duang！来与小伙伴们一起讨论学习中的问题吧。</p>
                    </div>
                </div>
            </div>
        </div>

<!-- Presentation -->
        <div class="presentation-container">
        	<div class="container">
        		<div class="row">
	        		<div class="col-sm-12 work-title wow fadeIn">
		                <h2>学习工具</h2>
		            </div>
            	</div>
        	</div>
        </div>

        <!-- Services -->
        <div class="services-container">
	        <div class="container">
	            <div class="row">
	            	<div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <a href="http://www.php100.com/html/plugin/dev/2013/0910/397.html" target="_blank"><img src="images/thumb_1.jpg" border="0" alt="DiagramDesigner 中文版"></a>
		                    <h3>DiagramDesigner 中文版</h3>
		                    <p>Diagram Designe简单画个流程图，做一些简单的演示，没有必要出动viso这样的恐龙级软件DiagramDesigne，小巧免费流程图绘制工具，多国语言支持，提供稍早版本源码。 V1 19,带简体繁体语言，支持多平台多语言使用。</p>
		                    <p>更新日期：2013-09-10 下载次数：14617</p>
		                </div>
					</div>
					<div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <a href="http://www.php100.com/html/plugin/dev/2013/0910/396.html" target="_blank"><img src="images/thumb_2.jpg" border="0" alt="SSH Secure Shell 经典版"></a>
		                    <h3>SSH Secure Shell 经典版</h3>
		                    <p>SSH是一种通用的、功能强大的、基于软件的网络安全解决方案。计算机每次向网络发送数据时，SSH都会自动对其进行加密。数据到达目的地时，SSH自动对加密数据进行解密。整个过程都是透明的，使用OpenSSH工具将会增进你的系统安全性。</p>
		                    <p>更新日期：2013-09-10 下载次数：33993</p>
		                </div>
					</div>
					<div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <a href="http://www.php100.com/html/plugin/dev/2013/0906/212.html" target="_blank"><img src="images/thumb_3.jpg" border="0" alt="easyeclipse-php-1.2.2.2"></a>
		                    <h3>easyeclipse-php-1.2.2.2</h3>
		                    <p>现在这个版本出了easyeclipse-php-1.2.2了我感觉已经比较成熟了，以前我都是用Easyeclipse的插件，这次又了整合版我们就不用多次下载了。这个的具体操作和实用技巧，我会尽快写个中文文档出来，给大家分享一下。</p>
		                    <p>更新日期：2013-09-06 下载次数：35088</p>
		                </div>
					</div>
					<div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <a href="http://www.php100.com/html/plugin/dev/2013/0906/211.html" target="_blank"><img src="images/thumb_4.jpg" border="0" alt="easyeclipse-php-1.2.2.2"></a>
		                    <h3>Zend Studio Windows 5.5</h3>
		                    <p>一个屡获大奖的专业 PHP 集成开发环境，具备功能强大的专业编辑工具和调试工具，支持PHP语法加亮显示，支持语法自动填充功能，支持书签功能，支持语法自动缩排和代码复制功能，内置一个强大的PHP代码调试工具，支持多种高级调试等功能。</p>
		                    <p>更新日期：2013-09-06 下载次数：23742</p>
		                </div>
					</div>
	            </div>
	        </div>
        </div>

        <!-- Services -->
        <div class="services-container">
	        <div class="container">
	        	<div class="row">
	        		<div class="col-sm-12 work-title wow fadeIn">
		                <h2>热门群组</h2>
		            </div>
            	</div>
	            <div class="row">
	<?php
    $_result_groups = mysql_query("SELECT * FROM groups ORDER BY id DESC LIMIT 8");
      while($_rows = mysql_fetch_array($_result_groups)){
      $_time = $_rows['group_time'];
      $_time = substr($_time, 0,10);
      if ($_rows['group_img']=="") {
        $_img = "default.jpg";
      }else{
        $_img = $_rows['group_img'];
      }
   ?>        
	            	<div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <img src="admin/images/groupface/<?php echo ($_img) ;?>" height="48" width="48" >
		                    <h3>话题: <?php echo($_rows['group_name']);?></h3>
		                   	<p>创建日期：<?php echo($_time);?></p>
		                    <p style="cursor:pointer;" onclick="javascript:alert('申请已提交，等待组长批准！');">[申请加入]</p>
		                </div>
					</div>
	<?php
		}
	?>
	            </div>
	        </div>
        </div>

        <!-- Call To Action -->
        <div class="call-to-action-container">
        	<div class="container">
        	<div class="row">
	            <div class="col-sm-12 work-title wow fadeIn">
	                <h2>笔记交流</h2><p></p>
	            </div>
            </div>
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			    <ul id="myTab" class="nav nav-tabs" role="tablist">
			      <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">学习笔记</a></li>
			      <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">学习问题</a></li>
			      <li role="presentation" class=""><a href="#file" role="tab" id="file-tab" data-toggle="tab" aria-controls="file" aria-expanded="false">答题结果</a></li>
			    </ul>
			    <div id="myTabContent" class="tab-content">
			      <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
			        <p>
<?php
	$_pagesize = 10;
	  $_result = mysql_query("SELECT * FROM note ORDER BY id DESC");
	  $_recordcount = mysql_num_rows($_result);
	  $_pagecount = ceil($_recordcount/$_pagesize);
	  $_page = $_GET['page'];
	  if($_page<=0)
	  {
	    $_page = 1;
	  }
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
	  $_result = mysql_query("SELECT * FROM note ORDER BY id DESC LIMIT $_start,$_pagesize");
    while($_rows = mysql_fetch_array($_result)){
      $_uid = $_rows['uid'];
      $_i = $_rows['id'];
      $_result_user = mysql_query("SELECT * FROM user WHERE id='$_uid'");
      $_rows_user = mysql_fetch_array($_result_user);
      if ($_rows_user['face']=="") {
        $_face = "default.jpg";
      }else{
        $_face = $_rows_user['face'];
      }
      $_sid = $_rows['sid'];
      $_result_video = mysql_query("SELECT * FROM video WHERE id='$_sid' ");
      $_rows_video = mysql_fetch_array($_result_video);
  ?>

  <!-- Modal -->
	<div class="modal fade" id="myModalss<?php echo $_i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">我来评价他的笔记</h4>
	      </div>
	      <form action="note_check.php" method="post" accept-charset="utf-8">
	      <div class="modal-body">
	        <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" rows="3" name="content"></textarea>
	      </div>
	      <input type="hidden" name="sid" value="<?php echo($_i);?>">
	      <div class="modal-footer">
	        <input type="button"  class="btn btn-default" data-dismiss="modal" value="关闭">
	        <input type="submit"  class="btn btn-default" name="submit" value="发表">
	      </div>
	      </form>
	    </div>
	  </div>
	</div>

  <div class="row">
	    <div class="col-sm-12 call-to-action-text wow fadeInLeftBig">
	        <div class="col-sm-2">
	        <img width="40px" height="40px" src="./admin/images/userface/<?php echo($_face);?>">
	        <?php echo($_rows_user['nickname']);?>
	        </div>
	        <div class="col-sm-2">
	        <a target="_blank" href="contact.php?id=<?php echo ($_i) ;?>"><img width="40px" height="40px" src="upload/images/videoimg/<?php echo $_rows_video['video_img'] ;?>"></a>
	        <a target="_blank" href="contact.php?id=<?php echo ($_i) ;?>"><?php echo($_rows_video['theme']);?></a>
	        </div>
	        <div class="col-sm-8">
	            <p>
	            	<?php echo($_rows['content']);?>
	            </p>
	            <div class="call-to-action-button">
	                <button style="margin-top:5px;" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalss<?php echo $_i;?>">我要评价
					</button>
					<button style="margin-top:5px;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExampless<?php echo $_i;?>" aria-expanded="false" aria-controls="collapseExample">
						所有评价
					</button>
	            </div>
		<?php
			$_result_answer = mysql_query("SELECT * FROM note_reply WHERE sid='$_i' LIMIT 1");
			$_recordcount = mysql_num_rows($_result_answer);
			if ($_recordcount == 0) {
		?>
			<div class="collapse" id="collapseExampless<?php echo $_i;?>">
			  <div class="well">
			    <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" rows="3">暂无评价</textarea>
			  </div>
			</div>
		<?php
			}else{
			while($_rows_answer = mysql_fetch_array($_result_answer)){
		?>
					<div class="collapse" id="collapseExampless<?php echo $_i;?>">
					  <div class="well">
					    <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" rows="3"><?php echo($_rows_answer['content']) ;?></textarea>
					  </div>
					</div>
		<?php
			}
		}
		?>
	        </div>


	    </div>
	</div><br>
<?php
      }
    ?></p>
    <div class="row">
		            <div class="col-sm-12 testimonials-title wow fadeIn">
		                <nav>
						  <ul class="pagination pagination-lg">
						    <li><a href="?page=<?php echo ($_page-1)?>#home" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
						    <li><a href="?page=1#home">1</a></li>
						    <li><a href="?page=2#home">2</a></li>
						    <li><a href="?page=3#home">3</a></li>
						    <li><a href="?page=4#home">4</a></li>
						    <li><a href="?page=5#home">5</a></li>
						    <li><a href="?page=<?php echo ($_page+1)?>#home" aria-label="Next"><span aria-hidden="true">»</span></a></li>
						  </ul>
						</nav>
		            </div>
	            </div>
			      </div>
			      <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
			        <p>
<?php
	  $_pagesize = 10;
	  $_result_question = mysql_query("SELECT * FROM question");
	  $_recordcount = mysql_num_rows($_result_question);
	  $_pagecount = ceil($_recordcount/$_pagesize);
	  $_page = $_GET['page'];
	  if($_page<=0)
	  {
	    $_page = 1;
	  }
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
	  $_result_question = mysql_query("SELECT * FROM question ORDER BY id DESC LIMIT $_start,$_pagesize");

		while($_rows = mysql_fetch_array($_result_question)){
			$_id = $_rows['id'];
			$_question_id = $_rows['sid'];
			$_uid = $_rows['uid'];
			$_result_user = mysql_query("SELECT * FROM user WHERE id='$_uid' LIMIT 1");
			$_rows_user = mysql_fetch_array($_result_user);
			if ($_rows_user['face']=="") {
			    $_img = "default.jpg";
			  }else{
			    $_img = $_rows_user['face'];
			  }
			$_result_video = mysql_query("SELECT * FROM video WHERE id='$_question_id' ");
    		$_rows_video = mysql_fetch_array($_result_video);
	?>
<!-- Modal -->
	<div class="modal fade" id="myModals<?php echo $_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">我来回答他</h4>
	      </div>
	      <form action="answer_check.php" method="post" accept-charset="utf-8">
	      <div class="modal-body">
	        <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" rows="3" name="content"></textarea>
	      </div>
	      <input type="hidden" name="sid" value="<?php echo($_id);?>">
	      <div class="modal-footer">
	        <input type="button"  class="btn btn-default" data-dismiss="modal" value="关闭">
	        <input type="submit"  class="btn btn-default" name="submit" value="发表">
	      </div>
	      </form>
	    </div>
	  </div>
	</div>

  <div class="row">
	    <div class="col-sm-12 call-to-action-text wow fadeInLeftBig">
	        <div class="col-sm-2">
	        <img width="40px" height="40px" src="./admin/images/userface/<?php echo($_img);?>" class="userimg">
	        <?php echo($_rows_user['nickname']);?>
	        </div>
	        <div class="col-sm-2">
	        <a target="_blank" href="contact.php?id=<?php echo $_question_id ;?>"><img width="40px" height="40px" src="upload/images/videoimg/<?php echo $_rows_video['video_img'] ;?>" class="userimg"></a>
	        <a target="_blank" href="contact.php?id=<?php echo $_question_id ;?>"><?php echo($_rows_video['theme']);?></a>
	        </div>
	        <div class="col-sm-8">
	            <p>
	            	<?php echo($_rows['question_content']) ;?>
	            </p>
	            <div class="call-to-action-button">
	                <button style="margin-top:5px;" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModals<?php echo $_id;?>">我要回答
					</button>
					<button style="margin-top:5px;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExamples<?php echo $_id;?>" aria-expanded="false" aria-controls="collapseExample">
						所有回答
					</button>
	            </div>
	    <?php
			$_result_answer = mysql_query("SELECT * FROM answer WHERE sid='$_id' LIMIT 1");
			$_recordcount = mysql_num_rows($_result_answer);
			if ($_recordcount == 0) {
		?>
			<div class="collapse" id="collapseExamples<?php echo $_id;?>">
			  <div class="well">
			    <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" rows="3">暂无回答</textarea>
			  </div>
			</div>
		<?php
			}else{
			while($_rows_answer = mysql_fetch_array($_result_answer)){
		?>
					<div class="collapse" id="collapseExamples<?php echo $_id;?>">
					  <div class="well">
					    <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" rows="3"><?php echo($_rows_answer['answer_content']) ;?></textarea>
					  </div>
					</div>
		<?php
			}
		}
		?>
	        </div>


	    </div>
	</div><br>
<?php
      }
    ?></p><div class="row">
		            <div class="col-sm-12 testimonials-title wow fadeIn">
		                <nav>
						  <ul class="pagination pagination-lg">
						    <li><a href="?page=<?php echo ($_page-1)?>#profile" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
						    <li><a href="?page=1#profile">1</a></li>
						    <li><a href="?page=2#profile">2</a></li>
						    <li><a href="?page=3#profile">3</a></li>
						    <li><a href="?page=4#profile">4</a></li>
						    <li><a href="?page=5#profile">5</a></li>
						    <li><a href="?page=<?php echo ($_page+1)?>#profile" aria-label="Next"><span aria-hidden="true">»</span></a></li>
						  </ul>
						</nav>
		            </div>
	            </div>
			      </div>
			    <div role="tabpanel" class="tab-pane fade" id="file" aria-labelledby="file-tab">
			        <p>
<?php
    $_result_mark = mysql_query("SELECT * FROM mark ORDER BY id DESC LIMIT 6");
      while($_rows = mysql_fetch_array($_result_mark)){
      	$_aid = $_rows['id'];
        $_uid = $_rows['uid'];
        $_name = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE id='$_uid' LIMIT 1"));
        $_sid = $_rows['sid'];
        $_title = mysql_fetch_array(mysql_query("SELECT * FROM video WHERE id='$_sid' LIMIT 1"));
    ?>
    <!-- Modal -->
	<div class="modal fade" id="myModal<?php echo $_aid;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">我来说说他</h4>
	      </div>
	      <form action="shuoshuo_check.php" method="post" accept-charset="utf-8">
	      <div class="modal-body">
	        <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" rows="3" name="content"></textarea>
	      </div>
	      <input type="hidden" name="sid" value="<?php echo($_aid);?>">
	      <div class="modal-footer">
	        <input type="button"  class="btn btn-default" data-dismiss="modal" value="关闭">
	        <input type="submit"  class="btn btn-default" name="submit" value="发表">
	      </div>
	      </form>
	    </div>
	  </div>
	</div>
  <div class="row">
	    <div class="col-sm-12 call-to-action-text wow fadeInLeftBig">
	        <div class="col-sm-2">
	        <img width="40px" height="40px" src="./admin/images/userface/<?php echo($_name['face']);?>">
	        <?php echo($_name['nickname']);?>
	        </div>
	        <div class="col-sm-2">
	        <a target="_blank" href="contact.php?id=<?php echo ($_i) ;?>"><img width="40px" height="40px" src="upload/images/videoimg/<?php echo $_title['video_img'] ;?>"></a>
	        <a target="_blank" href="contact.php?id=<?php echo ($_i) ;?>"><?php echo($_title['theme']);?></a>
	        </div>
	        <div class="col-sm-8">
	            <p>
	            	在"<?php echo($_title['theme']);?>"视频自测中取得<span style="color:red"><?php echo($_rows['mark']);?></span>分<br>
	            	<?php echo($_rows['time']);?>
	            </p>
	            <div class="call-to-action-button">
	                <button style="margin-top:5px;" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $_aid;?>">我要说说
					</button>
					<button style="margin-top:5px;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo $_aid;?>" aria-expanded="false" aria-controls="collapseExample">
						查看说说
					</button>
	            </div>
		<?php
			$_result_answer = mysql_query("SELECT * FROM shuoshuo WHERE sid='$_aid' LIMIT 1");
			$_recordcount = mysql_num_rows($_result_answer);
			if ($_recordcount == 0) {
		?>
			<div class="collapse" id="collapseExample<?php echo $_aid;?>">
			  <div class="well">
			    <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" rows="3">暂无回答</textarea>
			  </div>
			</div>
		<?php
			}else{
			while($_rows_answer = mysql_fetch_array($_result_answer)){
		?>
					<div class="collapse" id="collapseExample<?php echo $_aid;?>">
					  <div class="well">
					    <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" rows="3"><?php echo($_rows_answer['content']) ;?></textarea>
					  </div>
					</div>
		<?php
			}
		}
		?>
	        </div>


	    </div>
	</div><br>
<?php
      }
    ?></p><div class="row">
		            <div class="col-sm-12 testimonials-title wow fadeIn">
		                <nav>
						  <ul class="pagination pagination-lg">
						    <li><a href="?page=<?php echo ($_page-1)?>#file" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
						    <li><a href="?page=1#file">1</a></li>
						    <li><a href="?page=2#file">2</a></li>
						    <li><a href="?page=3#file">3</a></li>
						    <li><a href="?page=4#file">4</a></li>
						    <li><a href="?page=5#file">5</a></li>
						    <li><a href="?page=<?php echo ($_page+1)?>#file" aria-label="Next"><span aria-hidden="true">»</span></a></li>
						  </ul>
						</nav>
		            </div>
	            </div>
			      </div>

			    </div>
			  </div>

	        </div>
        </div>

<?php include("footer.php") ?>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/flexslider/jquery.flexslider-min.js"></script>
        <script src="assets/js/jflickrfeed.min.js"></script>
        <script src="assets/js/masonry.pkgd.min.js"></script>
        <!--<script src="http://maps.google.com/maps/api/js?sensor=true"></script>-->
        <script src="assets/js/jquery.ui.map.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>