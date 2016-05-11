<?php
  session_start();
  require("./admin/connect.php");
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
                        <li class="dropdown active">
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

        <!-- Slider -->
        <div class="slider-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="assets/img/slider/1.jpg">
                                    <img src="assets/img/slider/1.jpg">
                                    <div class="flex-caption">
                                    	<strong style="font-family:'微软雅黑',Arial,sans-serif;">观看微课，学无止境</strong>
                                    </div>
                                </li>
                                <li data-thumb="assets/img/slider/2.jpg">
                                    <img src="assets/img/slider/2.jpg">
                                    <div class="flex-caption">
                                    	<strong style="font-family:'微软雅黑',Arial,sans-serif;">乐享其中，名师讲解</strong>
                                    </div>
                                </li>
                                <li data-thumb="assets/img/slider/3.jpg">
                                    <img src="assets/img/slider/3.jpg">
                                    <div class="flex-caption">
                                    	<strong style="font-family:'微软雅黑',Arial,sans-serif;">专业指导，有问必答</strong>
                                    </div>
                                </li>
                                <li data-thumb="assets/img/slider/4.jpg">
                                    <img src="assets/img/slider/4.jpg">
                                    <div class="flex-caption">
                                    	<strong style="font-family:'微软雅黑',Arial,sans-serif;">习题检测，自我提高</strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest work -->
        <div class="work-container">
	        <div class="container">
	        	<div class="row">
		            <div class="col-sm-12 work-title wow fadeIn">
		                <h2>最新微课</h2>
		            </div>
	            </div>
	            <div class="row">
	<?php
	  $_result = mysql_query("SELECT * FROM video WHERE status='1' ORDER BY video_time DESC LIMIT 8");
	    while($_row = mysql_fetch_array($_result)){
	      $_time = $_row['video_time'];
	      $_time = substr($_time, 0,10);
	      $_id = $_row['id'];
	      $_re = mysql_query("SELECT * FROM reply WHERE sid='$_id'");
	      $_count = mysql_num_rows($_re);
	      if ($_row['video_img']=="") {
	        $_img = "default.jpg";
	      }else{
	        $_img = $_row['video_img'];
	      }
	  ?>
	            	<div class="col-sm-3">
		                <div class="work wow fadeInUp">
		                    <a target="_blank" href="contact.php?id=<?php echo ($_id) ;?>"><img src="upload/images/videoimg/<?php echo ($_img) ;?>" alt="Lorem Website" data-at2x="upload/images/videoimg/<?php echo ($_img) ;?>"></a>
		                    <h3><?php echo($_row['theme']);?></h3>
		                    <div style="font-family:'微软雅黑',Arial,sans-serif;height:120px;overflow:hidden;"><p><?php echo($_row['video_content']);?></p></div>
		                    <div class="work-bottom">
		                        <a target="_blank" class="big-link-2" href="contact.php?id=<?php echo ($_id) ;?>"><i class="fa fa-caret-square-o-right"></i></a>
		                        <a target="_blank" class="big-link-2 view-work" href="upload/images/videoimgs/<?php echo ($_id) ;?>.jpg"><i class="fa fa-ellipsis-h"></i></a>
		                    </div>
		                </div>
	                </div>
	<?php
      }
    ?>
	            </div>
	        </div>
        </div>

        <!-- Latest work -->
        <div class="work-container">
	        <div class="container">
	        	<div class="row">
		            <div class="col-sm-12 work-title wow fadeIn">
		                <h2>热门微课</h2>
		            </div>
	            </div>
	            <div class="row">
	<?php
    $_results = mysql_query("SELECT * FROM video WHERE status='1' ORDER BY video_playcount DESC LIMIT 12");
      while($_rows = mysql_fetch_array($_results)){
        $_id = $_rows['id'];
        if ($_rows['video_img']=="") {
          $_img = "default.jpg";
        }else{
          $_img = $_rows['video_img'];
        }
    ?>
	            	<div class="col-sm-3">
		                <div class="work wow fadeInUp">
		                    <a target="_blank" href="contact.php?id=<?php echo ($_id) ;?>" ><img src="upload/images/videoimg/<?php echo $_img ;?>" alt="Lorem Website" data-at2x="upload/images/videoimg/<?php echo $_img ;?>"></a>
		                    <h3><?php echo($_rows['theme']);?></h3>
		                    <div style="font-family:'微软雅黑',Arial,sans-serif;height:120px;overflow:hidden;"><p><?php echo($_rows['video_content']);?></p></div>
		                    <div class="work-bottom">
		                        <a target="_blank" class="big-link-2" href="contact.php?id=<?php echo ($_id) ;?>"><i class="fa fa-caret-square-o-right"></i></a>
		                        <a target="_blank" class="big-link-2 view-work" href="upload/images/videoimgs/<?php echo ($_id) ;?>.jpg"><i class="fa fa-gittip"></i></a>
		                    </div>
		                </div>
	                </div>
	<?php
      }
    ?>
	            </div>
	        </div>
        </div>

        <!-- Presentation -->
        <div class="presentation-container">
        	<div class="container">
        		<div class="row">
	        		<div class="col-sm-12 work-title wow fadeIn">
		                <h2>名师介绍</h2>
		            </div>
            	</div>
        	</div>
        </div>

        <!-- Services -->
        <div class="services-container">
	        <div class="container">
	            <div class="row">
	<?php
    $_result_teacher = mysql_query("SELECT * FROM teacher order by id asc LIMIT 4");
      while($_rows = mysql_fetch_array($_result_teacher)){
		$_id = $_rows['id'];
        $_teacher_id = $_rows['id'];
        if ($_rows['teacher_face']=="") {
          $_img = "default.jpg";
        }else{
          $_img = $_rows['teacher_face'];
        }
        $_str = $_rows['teacher_class'];
        $_num = substr_count($_str, "、");
        $_str = explode("、", $_str);
    ?>
	            	<div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <img class="img-circle" src="admin/images/teacherface/<?php echo ($_img) ;?>" alt="Lorem Website" data-at2x="admin/images/teacherface/<?php echo ($_img) ;?>">
		                    <h3><?php echo ($_rows['teacher_name']);?></h3>
		                    <p>专注课程：
              <?php
                for ($i=0; $i <= $_num; $i++) {
                  echo "<a target='_blank' href='about.php'>".$_str[$i]."</a>"."	";
                }
              ?></p>
		                    <button style="margin-top:5px;font-family:'微软雅黑',Arial,sans-serif;" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="" onclick="javascript:window.location.href='about.php' ">了解
							</button>&nbsp;&nbsp;
                            <button style="margin-top:5px;font-family:'微软雅黑',Arial,sans-serif;" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModals">提问
							</button>

		                </div>
					</div>
	<?php
		}
	?>
	            </div>
	        </div>
        </div>
<!-- Modal -->
	<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">向老师提问</h4>
	      </div>
	      <form action="index.php" method="post" accept-charset="utf-8">
		      <div class="modal-body">
		        <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" rows="3" name="content"></textarea>
		      </div>
	      <div class="modal-footer">
	        <input type="button"  class="btn btn-default" data-dismiss="modal" value="关闭">
	        <input type="submit"  class="btn btn-default" name="submit" value="发表">
	      </div>
	      </form>
	    </div>
	  </div>
	</div>
        <!-- Testimonials -->
        <div class="testimonials-container">
	        <div class="container">
	        	<div class="row">
		            <div class="col-sm-12 testimonials-title wow fadeIn">
		  
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