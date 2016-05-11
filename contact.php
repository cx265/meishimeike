<?php
  session_start();
  require("./admin/connect.php");
  if (!isset($_SESSION['user'])) {
        echo "<script language='javascript'>alert('请先登录！');
        window.location.href='login/login.php#tologin'</script>";
        exit();
    }else
  $_id = $_GET['id'];
	$_result = mysql_query("SELECT * FROM video WHERE id='$_id' LIMIT 1");
	$_row = mysql_fetch_array($_result);
  $_a_result = mysql_query("SELECT * FROM user WHERE nickname='$_nickname' LIMIT 1");
        $_a_row = mysql_fetch_array($_a_result);
        $_a_uid = $_a_row['id'];
        $_b_result = mysql_query("SELECT * FROM mytrack WHERE action='$_id' and foot='' and (DATE_SUB(CURDATE(), INTERVAL 1 DAY) <= date(time))");
    $_b_row = mysql_num_rows($_b_result);
    if ($_b_row) {
    }else{
    mysql_query("INSERT INTO mytrack (uid,foot,action,time) VALUES ('$_a_uid','','$_id',NOW())");
  }

	$_true = $_row['video_img'];
	$_video_playcount = ($_row['video_playcount']+'0');
	mysql_query("UPDATE video SET video_playcount='$_video_playcount' WHERE id='$_id' LIMIT 1");
	$_result_reply = mysql_query("SELECT * FROM reply WHERE sid='$_id' ORDER BY id DESC LIMIT 2");
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

  <link href="video-js.css" rel="stylesheet" type="text/css">
  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="video.js"></script>

  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    videojs.options.flash.swf = "video-js.swf";
  </script>
<link href="css/media.css" rel="stylesheet" type="text/css">
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
                        <li>
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
                        <i class="fa fa-envelope"></i>
                        <h1>微课学习 /</h1>
                        <p style="font-family:'微软雅黑',Arial,sans-serif;">Duang！边看微课，边记笔记，边问问题，边做习题。</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Us -->
        <div class="contact-us-container" style="padding-bottom: 0px;">
        	<div class="container">
	            <div class="row">
	            	<div style="float:right;" class="cx-col-3 col-sm-3 contact-form wow fadeInLeft">
	                <p style="font-family:'微软雅黑',Arial,sans-serif;">相关微课</p>
	<?php
     if ($_id>15) {
       $_a_id=$_id-rand(7,15);
     }else{
      $_a_id=$_id;
     }
     $_a_video = mysql_query("SELECT * FROM video WHERE status='1' ORDER BY id asc limit $_a_id,3");
     while($_a_row = mysql_fetch_array($_a_video)){
      $_a_id = $_a_row['id'];
      $_a_img = $_a_row['video_img'];
    ?>
       <div>
          <a href="contact.php?id=<?php echo ($_a_id);?>">
       <img width="150px;" height="100px;" src="./upload/images/videoimg/<?php echo ($_a_img);?>" alt="" class="img-rounded">
      </a>
          <a href="contact.php?id=<?php echo ($_a_id);?>"><p style="font-family: '微软雅黑',Arial,sans-serif;line-height: 20px;"><?php echo ($_a_row['theme']);?></p></a>
          <p style="font-family: '微软雅黑',Arial,sans-serif;line-height: 20px;"><?php echo ($_a_row['video_time']);?></p>
       </div>
    <?php
    }
    ?> 
    </div>
      <div class="col-sm-9 contact-address wow fadeInUp">
          <h3><?php echo($_row['theme']);?></h3>
	<video id="example_video_1" class="cxmedia video-js vjs-default-skin" controls preload="none" poster="" data-setup="{}">
    <source src="upload/video/<?php echo($_row['video_name']);?>" type='video/flv' />
    <!-- <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' /> -->
    <!-- <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' /> -->
    <track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
    <track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that</p>
  </video>
	                </div>

	            </div>
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-12 call-to-action-text wow fadeInLeftBig animated" style="visibility: visible; -webkit-animation: fadeInLeftBig;">
	                <div class="col-sm-1">
	                <span>参与分享</span>
	                </div>
	                <div class="col-sm-11">
						<a target="_blank" href="https://wx.qq.com/"><i class="fa fa-weixin fa-2x"></i></a>&nbsp;
						<a target="_blank" href="http://weibo.com/"><i class="fa fa-weibo fa-2x"></i></a>&nbsp;
						<a target="_blank" href="http://w.qq.com/"><i class="fa fa-qq fa-2x"></i></a>&nbsp;
						<a target="_blank" href="http://www.renren.com/"><i class="fa fa-renren fa-2x"></i></a>&nbsp;
						<a target="_blank" href="http://t.qq.com/"><i class="fa fa-tencent-weibo fa-2x"></i></a>&nbsp;
						<a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook fa-2x"></i></a>&nbsp;
                        <a target="_blank" href="https://dribbble.com/"><i class="fa fa-dribbble fa-2x"></i></a>&nbsp;
                        <a target="_blank" href="https://twitter.com/"><i class="fa fa-twitter fa-2x"></i></a>&nbsp;
                        <a target="_blank" href="https://www.pinterest.com/"><i class="fa fa-pinterest fa-2x"></i></a>
						<a target="_blank" href="#"><i class="fa fa-paw fa-2x"></i></a>&nbsp;
						<a target="_blank" href="#"><i class="fa fa-at fa-2x"></i></a>&nbsp;
						<a target="_blank" href="#"><i class="fa fa-git-square fa-2x"></i></a>&nbsp;
						<a target="_blank" href="#"><i class="fa fa-link fa-2x"></i></a>&nbsp;
						<a target="_blank" href="#"><i class="fa fa-github-alt fa-2x"></i></a>&nbsp;
						<a target="_blank" href="#"><i class="fa fa-github-square fa-2x"></i></a>&nbsp;
						<a target="_blank" href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>&nbsp;
 						
	                </div>
	        </div>
        </div>
	        </div>
        </div>
		
        <!-- Testimonials -->
        <div class="testimonials-container">
	        <div class="container">
	        	<div class="row">
		            <div class="col-sm-12 testimonials-title wow fadeIn">
		                <h2 style="width: 100px;">学习菜单</h2>
		            </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-10 col-sm-offset-1 testimonial-list">
	                	<div role="tabpanel">
	                		<!-- Tab panes -->
	                		<div class="tab-content">
	                			<div role="tabpanel" class="tab-pane fade in active" id="tab1">
	                				<div class="testimonial-image">
	                					<img src="assets/img/testimonials/1.jpg" alt="" data-at2x="assets/img/testimonials/1.jpg">
	                				</div>
	                				<div class="testimonial-text">
	                				<p style="font-family:'微软雅黑',Arial,sans-serif;">记录学习笔记</p>
	                					<form action="question_checkss.php" method="post" name="form1" accept-charset="utf-8">
		                                <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" name="content" rows="3"></textarea>
		                                <input type="hidden" name="videoid" value="<?php echo ($_id);?>" />
		                                <input style="font-family:'微软雅黑',Arial,sans-serif;" type="submit" name="submit" value="记录" class="btn btn-default">
		                                </form>
	                                </div>
	                			</div>
	                			<div role="tabpanel" class="tab-pane fade" id="tab2">
	                				<div class="testimonial-image">
	                					<img src="assets/img/testimonials/2.jpg" alt="" data-at2x="assets/img/testimonials/2.jpg">
	                				</div>
	                				<div class="testimonial-text">
	                				<p style="font-family:'微软雅黑',Arial,sans-serif;">评价视频</p>
		                                <form action="reply_check.php" method="post" name="form" accept-charset="utf-8">
		                                <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" name="content" rows="3"></textarea>
		                                <input type="hidden" name="videoid" value="<?php echo ($_id);?>" />
		                                <input style="font-family:'微软雅黑',Arial,sans-serif;" type="submit" name="submit" value="评价" class="btn btn-default">
		                                </form>
	                                </div>
	                			</div>
	                			<div role="tabpanel" class="tab-pane fade" id="tab3">
	                				<div class="testimonial-image">
	                					<img src="assets/img/testimonials/3.jpg" alt="" data-at2x="assets/img/testimonials/3.jpg">
	                				</div>
	                				<div class="testimonial-text">
	                				<p style="font-family:'微软雅黑',Arial,sans-serif;">我要提问</p>
		                                <form action="question_check.php" method="post" name="form" accept-charset="utf-8">
		                                <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" name="content" rows="3"></textarea>
		                                <input type="hidden" name="videoid" value="<?php echo ($_id) ;?>" />
		                                <input style="font-family:'微软雅黑',Arial,sans-serif;" type="submit" name="submit" value="提问" class="btn btn-default">
		                                </form>
	                                </div>
	                			</div>
	                			<div role="tabpanel" class="tab-pane fade" id="tab4">
	                				<div class="testimonial-image">
	                					<img src="assets/img/testimonials/4.jpg" alt="" data-at2x="assets/img/testimonials/4.jpg">
	                				</div>
	                				<div style="font-family:'微软雅黑',Arial,sans-serif;" class="testimonial-text">
	<form action="test_check.php?id=<?php echo($_id);?>" method="post" name="test" class="niceform" enctype="multipart/form-data">
<?php
  	$_nickname = $_SESSION['user'];
  	$_result_user = mysql_query("SELECT * FROM user WHERE nickname='$_nickname' LIMIT 1");
    $_rows = mysql_fetch_array($_result_user);
    $_nickid = $_rows['id'];
  	$_number = mysql_query("SELECT * FROM test WHERE status='1' ");
  	$_count = mysql_num_rows($_number)-3;
  	$_sid = rand(1,$_count);
  	$_result_test = mysql_query("SELECT * FROM test WHERE status='1' LIMIT $_sid,5");
  	$_num = 0;
    while($_rows_test = mysql_fetch_array($_result_test)){
    	$_num += 1;
    	$_fen = rand(0,10);
    	$_miao = rand(10,59);
    	$_shijian = '请看视频'.' '.'0'.$_fen.':'.$_miao.'讲解';
    	if ($_fen==10) {
    		$_shijian = '视频中虽然没有讲到，但是看题目应该可以知道真确答案！';
    	}
	?>
<li style="display:block;margin-top:10px;">
	题目:<b><?php echo($_rows_test['test_title']);?></b>&nbsp;&nbsp;<input onclick="javascript:alert('<?php echo($_shijian);?>')" type="button" value="解题思路" ><br />
	<div class="row">
	<div class="col-sm-6 contact-address wow fadeInUp">
	【A】<input type="radio" checked="checked" name="<?php echo($_num);?>" value="A"/><input style="border:none;width:200px;" readonly="readonly" type="text" value="<?php echo($_rows_test['test_a']);?>" /></div>
	<div class="col-sm-6 contact-address wow fadeInUp">
	【B】<input type="radio" name="<?php echo($_num);?>" value="B"/><input style="border:none;width:200px;" readonly="readonly" type="text" value="<?php echo($_rows_test['test_b']);?>" /></div><br>
	<div class="col-sm-6 contact-address wow fadeInUp">
	【C】<input type="radio" name="<?php echo($_num);?>" value="C"/><input style="border:none;width:200px;" readonly="readonly" type="text" value="<?php echo($_rows_test['test_c']);?>" /></div>
	<div class="col-sm-6 contact-address wow fadeInUp">
	【D】<input type="radio" name="<?php echo($_num);?>" value="D"/><input style="border:none;width:200px;" readonly="readonly" type="text" value="<?php echo($_rows_test['test_d']);?>" /></div>
	</div>
</li>
<?php
}
?>
<input style="font-family:'微软雅黑',Arial,sans-serif;" type="submit" name="submit" value="交卷" class="btn btn-default">
<input type="hidden" name="nick" value="<?php echo($_nickid);?>" />
</form>
	                                </div>
	                			</div>
	                		</div>
	                		<!-- Nav tabs -->
	                		<ul class="nav nav-tabs" role="tablist">
	                			<li role="presentation" class="active">
	                				<a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"></a>
	                			</li>
	                			<li role="presentation">
	                				<a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"></a>
	                			</li>
	                			<li role="presentation">
	                				<a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"></a>
	                			</li>
	                			<li role="presentation">
	                				<a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"></a>
	                			</li>
	                		</ul>
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