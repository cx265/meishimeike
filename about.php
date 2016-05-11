<?php
session_start();
  require("./admin/connect.php");
  if (!isset($_SESSION['user'])) {
        echo "<script language='javascript'>alert('请先登录！');
        window.location.href='login/login.php#tologin'</script>";
        exit();
    }else
  $_result = mysql_query("SELECT * FROM teacher");
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
                        <li>
                            <a href="services.php"><i class="fa fa-comments"></i><br>学习社区</a>
                        </li>
                        <li class="dropdown active">
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
                        <i class="fa fa-user"></i>
                        <h1>名师介绍 /</h1>
                        <p style="font-family:'微软雅黑',Arial,sans-serif;">Duang！众多优秀微课名师与你面对面。</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Meet Our Team -->
        <div class="team-container">
        	<div class="container">
	            <div class="row">	 
<?php
$_pagesize = 8;
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
  $_result = mysql_query("SELECT * FROM teacher LIMIT $_start,$_pagesize");
while($_row = mysql_fetch_array($_result)){
	$_id = $_row['id'];
  if ($_row['teacher_face']=="") {
    $_face = "default.jpg";
  }else{
    $_face = $_row['teacher_face'];
  }
?>
	            	<div class="col-sm-3">
		                <div class="team-box wow fadeInUp">
		                    <img src="admin/images/teacherface/<?php echo($_face);?>" alt="" data-at2x="admin/images/teacherface/<?php echo($_face);?>">
		                    <h3><?php echo($_row['teacher_name']);?></h3>
		                    <div style="font-family:'微软雅黑',Arial,sans-serif;height:120px;overflow:hidden;"><p><?php echo($_row['teacher_introduce']);?></p></div>
		                    <div class="team-social">
		                        <a title="QQ交流" href="http://web2.qq.com/"><i class="fa fa-qq"></i></a>
                                <a title="给他点赞" href="javascript:;"><i class="fa fa-hand-o-up"></i></a>
                                <a title="咨询、交流" href="http://im.qq.com/mobileqq/"><i class="fa fa-comments-o"></i></a>
                                <a title="发他私信" href="http://mail.163.com/"><i class="fa fa-envelope"></i></a>
		                    </div>
		                </div>
	                </div>
<?php
	}
?>
 
	            </div>
	        </div>
        </div>
<!-- Testimonials -->
        <div class="testimonials-container">
	        <div class="container">
	        	<div class="row">
		            <div class="col-sm-12 testimonials-title wow fadeIn">
		                <nav>
						  <ul class="pagination pagination-lg">
						    <li><a href="?page=<?php echo ($_page-1)?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
						    <li><a href="?page=1">1</a></li>
						    <li><a href="?page=2">2</a></li>
						    <li><a href="?page=3">3</a></li>
						    <li><a href="?page=4">4</a></li>
						    <li><a href="?page=5">5</a></li>
						    <li><a href="?page=<?php echo ($_page+1)?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
						  </ul>
						</nav>
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