<?php
  session_start();
  require("./admin/connect.php");
  if (!isset($_SESSION['user'])) {
        echo "<script language='javascript'>alert('请先登录！');
        window.location.href='login/login.php#tologin'</script>";
        exit();
    }else
    $_keyword = $_POST['keyword'].$_GET['keyword'];
  if ($_keyword=="" || !isset($_keyword)) {
      $_result = mysql_query("SELECT * FROM video WHERE status='1' ");
  }
  else{
    switch($_keyword){
      case "time1":
        $_result = mysql_query("SELECT * FROM video WHERE status='1' and (DATE_SUB(CURDATE(), INTERVAL 3 DAY) <= date(video_time))");
      break;
      case "time2":
        $_result = mysql_query("SELECT * FROM video WHERE status='1' and (DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(video_time))");
      break;
      case "time3":
        $_result = mysql_query("SELECT * FROM video WHERE status='1' and DATE_FORMAT(video_time,'%Y%m') = DATE_FORMAT(CURDATE(),'%Y%m')");
      break;
      case "time4":
        $_result = mysql_query("SELECT * FROM video WHERE status='1' and (DATE_SUB(CURDATE(), INTERVAL 365 DAY) <= date(video_time))");
      break;
      default:
        $_result = mysql_query("SELECT * FROM video WHERE status='1' and (video_name LIKE '$_keyword' or video_type LIKE '$_keyword') ");
    }
  }
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
  if ($_keyword=="" || !isset($_keyword)) {
      $_result = mysql_query("SELECT * FROM video WHERE status='1' ORDER BY id DESC LIMIT $_start,$_pagesize");
  }
  else{
    switch($_keyword){
      case "time1":
        $_result = mysql_query("SELECT * FROM video WHERE status='1' and (DATE_SUB(CURDATE(), INTERVAL 3 DAY) <= date(video_time)) ORDER BY id DESC LIMIT $_start,$_pagesize");
      break;
      case "time2":
        $_result = mysql_query("SELECT * FROM video WHERE status='1' and (DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(video_time)) ORDER BY id DESC LIMIT $_start,$_pagesize");
      break;
      case "time3":
        $_result = mysql_query("SELECT * FROM video WHERE status='1' and DATE_FORMAT(video_time,'%Y%m') = DATE_FORMAT(CURDATE(),'%Y%m')  ORDER BY id DESC LIMIT $_start,$_pagesize");
      break;
      case "time4":
        $_result = mysql_query("SELECT * FROM video WHERE status='1' and (DATE_SUB(CURDATE(), INTERVAL 365 DAY) <= date(video_time)) ORDER BY id DESC LIMIT $_start,$_pagesize");
      break;
      default:
        $_result = mysql_query("SELECT * FROM video WHERE status='1' and (video_name LIKE '%$_keyword%' or video_type LIKE '%$_keyword%') ORDER BY id DESC LIMIT $_start,$_pagesize");
    }
  }
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
                        <li class="dropdown active">
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
                        <i class="fa fa-camera"></i>
                        <h1>微课天地 /</h1>
                        <p style="font-family:'微软雅黑',Arial,sans-serif;">Duang！各类优秀微课视频，来定制自己的微课学习任务吧。</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio -->
        <div class="work-container">
	        <div class="container">
	            <div class="row">
<div class="bs-example">
    <ul class="nav nav-pills" role="tablist">
      <li role="presentation" class="dropdown">
        <a id="drop0" href="portfolio.php" >
          所有微课
        </a>
      </li>
      <li role="presentation" class="dropdown">
        <a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
          编程语言
          <span class="caret"></span>
        </a>
        <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop1">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%PHP%">PHP</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%Java%">Java</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%C%">C</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%C++%">C++</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%jsp%">jsp</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%.NET%">.NET</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%VB%">VB</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%VC++%">VC++</a></li>
        </ul>
      </li>
      <li role="presentation" class="dropdown">
        <a id="drop2" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
          数据库
          <span class="caret"></span>
        </a>
        <ul id="menu2" class="dropdown-menu" role="menu" aria-labelledby="drop2">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%oracle%">oracle</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%sybase%">sybase</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%MySQL%">MySQL</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%SQLserver%">SQL server</a></li>
        </ul>
      </li>
      <li role="presentation" class="dropdown">
        <a id="drop3" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
          嵌入式开发
          <span class="caret"></span>
        </a>
        <ul id="menu3" class="dropdown-menu" role="menu" aria-labelledby="drop3">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%Linux%">Linux</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%Android%">Android</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%iOS%">iOS</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%WinCE%">WinCE</a></li>
        </ul>
      </li>
      <li role="presentation" class="dropdown">
        <a id="drop3" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
          多媒体
          <span class="caret"></span>
        </a>
        <ul id="menu3" class="dropdown-menu" role="menu" aria-labelledby="drop3">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%image%">界面设计</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%duomeiti%">媒体设计开发</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%meishu%">网站美术设计</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%Flash%">Flash</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%Photoshop%">Photoshop</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=%Fireworks%">Fireworks</a></li>
        </ul>
      </li>
      <li role="presentation" class="dropdown">
        <a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
          发布日期
          <span class="caret"></span>
        </a>
        <ul id="menu4" class="dropdown-menu" role="menu" aria-labelledby="drop4">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=time1">三天内</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=time2">七天内</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=time3">一个月内</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="portfolio.php?page=1&keyword=time4">一年内</a></li>
        </ul>
      </li>
    </ul> <!-- /pills -->
  </div>

					    <div class="input-group col-sm-4 navbar-right">
					      <input type="text" class="form-control" placeholder="Search for...">
					      <span class="input-group-btn">
  					      <form action="portfolio.php" autocomplete="off" method="post">
  					        <button name="keyword" class="btn btn-default" type="submit" style="height:34px;">搜索</button>
                    			<input type="hidden" value="%php%" name="keyword" >
  					     </form>
					      </span>
					    </div><!-- /input-group -->
	            </div>

<!-- Latest work -->
        <div class="work-container">
          <div class="container">
              <div class="row">
  <?php
    while($_row = mysql_fetch_array($_result)){
      $_id = $_row['id'];
      $_time = $_row['video_time'];
      $_time = substr($_time, 0,10);
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