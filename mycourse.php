<?php
session_start();
  require("./admin/connect.php");
  if (!isset($_SESSION['user'])) {
        echo "<script language='javascript'>alert('请先登录！');
        window.location.href='login/login.php#tologin'</script>";
        exit();
    }else
  $_name = $_SESSION['user'];
  if ($_name == 'teacher') {
  	$_name = 'guest';
  }
  $_result = mysql_query("SELECT * FROM user WHERE nickname='$_name' ");
    $_rows = mysql_fetch_array($_result);
    $_id = $_rows['id'];
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
    <!-- 生日时间 -->
<link type="text/css" rel="stylesheet" href="./admin/css/calendar.css" >

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
                        <li class="dropdown active">
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

        <!-- Call To Action -->
        <div class="call-to-action-container">
        	<div class="container">
        	<div class="row">
	            <div class="col-sm-12 work-title wow fadeIn">
	                <h2>个人空间</h2>
	            </div>
            </div>
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			    <ul id="myTab" class="nav nav-tabs" role="tablist">
			      <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">收藏课程</a></li>
			      <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">我的笔记</a></li>
			      <li role="presentation" class=""><a href="#file" role="tab" id="file-tab" data-toggle="tab" aria-controls="file" aria-expanded="false">个人资料</a></li>
			      <li role="presentation" class=""><a href="#my" role="tab" id="my-tab" data-toggle="tab" aria-controls="my" aria-expanded="false">讨论小组</a></li>
			      <li role="presentation" class=""><a href="#see" role="tab" id="see-tab" data-toggle="tab" aria-controls="see" aria-expanded="false">历史记录</a></li>
			      <li role="presentation" class=""><a href="#full" role="tab" id="full-tab" data-toggle="tab" aria-controls="full" aria-expanded="false">今日推荐</a></li>
			      <li role="presentation" class=""><a href="upload.php" target="_blank" onClick="javascript:window.open('upload.php','','scrollbars=yes,width=800,height=570,top=100,left=60')">我来分享</a></li>
			      <li role="presentation" class=""><a href="test.php" target="_blank" onClick="javascript:window.open('test.php','','scrollbars=yes,width=1000,height=570,top=100,left=60')">录制微课</a></li>
			    </ul>
			    <div id="myTabContent" class="tab-content">
			      <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
			        <p>
			          <div class="row">
<?php
$_result_user = mysql_query("SELECT * FROM user WHERE nickname='$_name' LIMIT 1");
    $_rows_user = mysql_fetch_array($_result_user);
    $_uid = $_rows_user['id'];
    $_result_collect = mysql_query("SELECT * FROM collect WHERE uid='$_uid' ");
    while($_rows_collect = mysql_fetch_array($_result_collect)){
        $_vid = $_rows_collect['vid'];
        $_result_video = mysql_query("SELECT * FROM video WHERE status='1' and id='$_vid'");
	  
        while($_row = mysql_fetch_array($_result_video)){
          $_time = $_row['video_time'];
          $_time = substr($_time, -5,1);
switch ($_time) {
    case '1':
        $_time = $_time-1;
        break;
    case '2':
        $_time = $_time-2;
        break;
    case '3':
        $_time = $_time-3;
        break;
    case '4':
        $_time = $_time-4;
        break;
    case '5':
        $_time = $_time-5;
        break;
    default:
        break;
}
$_times = $_row['video_time'];
$_times = substr($_times, -4);
$_time = $_time.$_times;
          $_id = $_row['id'];
          if ($_row['video_img']=="") {
            $_img = "default.jpg";
          }else{
            $_img = $_row['video_img'];
          }
  ?>

	    <div class="col-sm-3">
		                <div class="work wow fadeInUp">
		                    <a target="_blank" href="contact.php?id=<?php echo ($_id) ;?>" ><img src="upload/images/videoimg/<?php echo $_img ;?>" alt="Lorem Website" data-at2x="upload/images/videoimg/<?php echo ($_img) ;?>"></a>
		                    <h3><?php echo($_row['theme']);?></h3>
		                    <div style="font-family:'微软雅黑',Arial,sans-serif;height:100px;overflow:hidden;"><p><?php echo($_row['video_content']);?></p></div>
		                    <div class="work-bottom">
		                        <a href="./contact.php?id=<?php echo($_id);?>" class="btn btn-info btn-lg active" role="button" title="" target="_blank">
					                继续学习
					            </a>
		                        <a href="collect_delete.php?id=<?php echo($_id);?>&user=<?php echo($_SESSION['user']) ;?>" class="btn btn-info btn-lg active" role="button">取消收藏</a>
		                    </div>
		                </div>
	                </div>

<?php
    }  }
    ?></p>
	</div>
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
	$_id = 1;
	  $_pagesize = 5;
      $_result_note = mysql_query("SELECT * FROM note WHERE uid='$_id' ORDER BY note_time DESC");
      $_recordcount = mysql_num_rows($_result_note);
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
      $_result_note = mysql_query("SELECT * FROM note WHERE uid='$_id' ORDER BY note_time DESC LIMIT $_start,$_pagesize");
        while($_rows_note = mysql_fetch_array($_result_note)){
        $_sid = $_rows_note['sid'];
        $_result_video = mysql_query("SELECT * FROM video WHERE id='$_sid'");
        $_rows_video = mysql_fetch_array($_result_video);
        if ($_rows_video['video_img']=="") {
            $_img = "default.jpg";
          }else{
            $_img = $_rows_video['video_img'];
          }
	?>
  <div class="row">
	    <div class="col-sm-12 call-to-action-text wow fadeInLeftBig">
	        <div class="col-sm-2">
	        <a href="contact.php?id=<?php echo($_rows_video['id']);?>">
            <img width="50px;" height="50px;" src="upload/images/videoimg/<?php echo ($_img) ;?>" >
            </a>
            <?php echo ($_rows_video['theme']) ;?>
	        </div>
	        <div class="col-sm-10">
	            <p title="<?php echo($_rows_note['content']);?>">
	            	<?php echo($_rows_note['content']);?>
	            </p>
	            <div class="call-to-action-button">
	                <?php echo($_rows_note['note_time']);?>
	                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $_rows_note['id']?>">修改
					</button><p>
	            </div>

	        </div>
	    </div>
	</div><br>
				<!-- Modal -->
				<div class="modal fade" id="myModal<?php echo $_rows_note['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">我的笔记</h4>
				      </div>
				      <div class="modal-body">
				        <textarea style="font-family:'微软雅黑',Arial,sans-serif;" class="form-control" rows="3"><?php echo($_rows_note['content']);?></textarea>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				        <button type="button" class="btn btn-default">保存</button>
				      </div>
				    </div>
				  </div>
				</div>         
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
  <div class="row">
	    <div class="col-sm-12 call-to-action-text wow fadeInLeftBig">
<form action="save.php?id=<?php echo($_id) ?>" method="post" name="niceform" class="niceform" id="form1" onsubmit="return check();">
  <div class="form-group">
    <label for="exampleInputEmail1">姓　名:</label>
    <input style="font-family:'微软雅黑',Arial,sans-serif;" type="text" class="form-control" id="exampleInputEmail1" name="truename" value="<?php echo $_rows['truename']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">昵　称:</label>
    <input style="font-family:'微软雅黑',Arial,sans-serif;" type="text" class="form-control" id="exampleInputEmail2" name="nickname" value="<?php echo $_rows['nickname']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail3">性　别:</label><br>
	    <label class="radio-inline">
		  <input type="radio" name="sex" id="nan" value="男" <?php if($_rows['sex'] == "男") echo 'checked="checked"';?>> <label for="nan">男</label>
		</label>
		<label class="radio-inline">
		  <input type="radio" name="sex" id="nv" value="女" <?php if($_rows['sex'] == "女") echo 'checked="checked"'; ?>> <label for="nv">女</label>
		</label>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail4">生　日:</label>
    <input type="text" class="form-control" id="exampleInputEmail4" name="birth" id="EntTime" value="<?php echo $_rows['birth'];?>" onclick="return showCalendar('EntTime', 'y-mm-dd');">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail5">邮　箱:</label>
    <input type="text" class="form-control" id="exampleInputEmail5" name="email" value="<?php echo $_rows['email']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail6">电　话:</label>
    <input type="text" class="form-control" id="exampleInputEmail6" name="telephone" value="<?php echo $_rows['telephone']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail7">Q　Q:</label>
    <input type="text" class="form-control" id="exampleInputEmail7" name="qq" value="<?php echo $_rows['qq']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail8">个人介绍:</label>
    <textarea style="font-family:'微软雅黑',Arial,sans-serif;" name="introduce" class="form-control" rows="3"><?php echo $_rows['introduce'];?></textarea>
  </div>
  <button type="submit" class="btn btn-default">修改</button>
</form>
	    </div>
	</div><br>
</p>
			      </div>

			      <div role="tabpanel" class="tab-pane fade" id="my" aria-labelledby="my-tab">
			        <p>  <div class="row">
<?php
     $_result_p = mysql_query("SELECT * FROM group_p WHERE uid='$_uid' ");
    while($_rows_p = mysql_fetch_array($_result_p)){
        $_gid = $_rows_p['gid'];
        $_result_group = mysql_query("SELECT * FROM groups WHERE id='$_gid' ORDER BY id DESC LIMIT 10");
        $_rows_group = mysql_fetch_array($_result_group);
    $_gname = $_rows_group['group_name'];
    $_id = $_rows_group['id'];
          if ($_rows_group['group_img']=="") {
            $_img = "default.jpg";
          }else{
            $_img = $_rows_group['group_img'];
          }
    $_name_id = $_rows_group['group_leader'];
                $_a = mysql_query("SELECT * FROM user WHERE id='$_name_id' LIMIT 1");
                $_b = mysql_fetch_array($_a);
                $_c = $_b['nickname'];
    ?>

	    <div class="col-sm-2">
	        <div class="work wow fadeInUp">
	        <img src="admin/images/groupface/<?php echo ($_img) ;?>" alt="" title=""><br>
	            <a style="cursor:pointer;"  onClick="javascript:window.open('./liaotian/index.php?id=<?php echo($_id);?>','','scrollbars=yes,width=598,height=570,top=100,left=60')">
                进入讨论
            </a>
	            <h3 style="font-family:'微软雅黑',Arial,sans-serif;height:30px;overflow:hidden;"><?php echo ($_gname) ;?></h3>
	            <div><p style="font-family:'微软雅黑',Arial,sans-serif;">创建者：<?php echo ($_c) ;?></p></div>
	        </div>
	    </div>

<?php
      }
    ?></p>
    	</div><br><div class="row">
		            <div class="col-sm-12 testimonials-title wow fadeIn">
		                <nav>
						  <ul class="pagination pagination-lg">
						    <li><a href="?page=<?php echo ($_page-1)?>#my" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
						    <li><a href="?page=1#my">1</a></li>
						    <li><a href="?page=2#my">2</a></li>
						    <li><a href="?page=3#my">3</a></li>
						    <li><a href="?page=4#my">4</a></li>
						    <li><a href="?page=5#my">5</a></li>
						    <li><a href="?page=<?php echo ($_page+1)?>#my" aria-label="Next"><span aria-hidden="true">»</span></a></li>
						  </ul>
						</nav>
		            </div>
	            </div>
			      </div>

			      <div role="tabpanel" class="tab-pane fade" id="see" aria-labelledby="see-tab">
			        <p>
<?php
    $_id = 1;
		$_result = mysql_query("SELECT * FROM mytrack WHERE uid='$_id' ORDER BY time desc limit 10");
		while($_row = mysql_fetch_array($_result)){
			$_time = $_row['time'];
			$_time_a = substr($_time, 0,4);
			$_time_b = substr($_time, 5,6);
			$_time_c = substr($_time, 11,8);
    ?>
  <div class="row">
	    <div class="col-sm-12 call-to-action-text wow fadeInLeftBig">

			<div class="col-sm-4">
				<?php echo($_time_a)?> <?php echo($_time_b)?> <?php echo($_time_c)?>
			</div>
	        <div class="col-sm-8">
	            <?php
						$_foot = $_row['foot'];
						$_vid = $_row['action'];
						if ($_vid!=0) {
							$_result_video = mysql_query("SELECT * FROM video WHERE status='1' and id='$_vid' LIMIT 1");
							$_row_video = mysql_fetch_array($_result_video);
						}
						if (is_numeric($_foot)) {
							?>
							<div class="hisct">你在自我评测中取得<?php echo($_row['foot'])?>分！</div>
							<div class="hisct">
							<a href="../contact.php?id=<?php echo($_vid);?>" title="进入微课" target="_blank">
                				<?php echo($_row_video['theme'])?>
            				</a>
            				</div>
						<?php
							}if ($_foot=="") {
						?>
							<div class="hisct">你观看了微课视频：</div>
							<a href="../contact.php?id=<?php echo($_vid);?>" title="进入微课" target="_blank">
                				<?php echo($_row_video['theme'])?>
            				</a>
						<?php
							}
							$_zimu = substr($_foot, 0,6);
							if ($_zimu=="你记"){
						?>
						<div class="hisct"><?php echo($_row['foot'])?></div>
						<div class="hisct">
						<a href="../contact.php?id=<?php echo($_vid);?>" title="进入微课" target="_blank">
                				<?php echo($_row_video['theme'])?>
            			</a>
						</div>
						<?php
							}if ($_zimu=="你参"){
								$_a = "【";
								$_pos = strpos($_foot,$_a,0)+3;
								$_str = substr($_foot, $_pos,9);
								$_a_result = mysql_query("SELECT * FROM groups WHERE group_name LIKE '$_str%' LIMIT 1");
								$_a_row = mysql_fetch_array($_a_result);
								$_tid = $_a_row['id'];
						?>
						<div class="hisct"><?php echo($_row['foot'])?></div>
						<div class="hisct">
						<a href="liaotian/index.php?id=<?php echo($_tid);?>" title="进入讨论组" target="_blank">
                				<?php echo($_a_row['group_name'])?>
            			</a>
						</div>
						<?php
							}if($_zimu!="你参" and $_zimu!="你记" and !is_numeric($_foot)){
						?>
						<div class="hisct"><?php echo($_row['foot'])?></div>
						<?php
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
						    <li><a href="?page=<?php echo ($_page-1)?>#see" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
						    <li><a href="?page=1#see">1</a></li>
						    <li><a href="?page=2#see">2</a></li>
						    <li><a href="?page=3#see">3</a></li>
						    <li><a href="?page=4#see">4</a></li>
						    <li><a href="?page=5#see">5</a></li>
						    <li><a href="?page=<?php echo ($_page+1)?>#see" aria-label="Next"><span aria-hidden="true">»</span></a></li>
						  </ul>
						</nav>
		            </div>
	            </div>
			      </div>

			      <div role="tabpanel" class="tab-pane fade" id="full" aria-labelledby="full-tab">
			        <p>
              <!-- Latest work -->
        <div class="work-container">
          <div class="container">
           <div class="row">
<?php
    $_a = Date(d);
if ($_a>15) {
    $_a = $_a-15;
}
        $_result_video = mysql_query("SELECT * FROM video WHERE status='1' ORDER BY video_playcount DESC LIMIT $_a,8");
        while($_row = mysql_fetch_array($_result_video)){
          $_id = $_row['id'];
          $_theme = $_row['theme'];
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
    ?></p>
	</div></div></div>
			      </div>

			    </div>
			  </div>	            
	        </div>
        </div>



<?php include("footer.php") ?>
    <!-- 生日时间 -->
<script type="text/javascript" src="./js/myinfromation.js"></script>
<script type="text/javascript" src="./admin/js/calendar.js" charset="gb2312"></script>
<script type="text/javascript" src="./admin/js/calendar-zh.js" charset="gb2312"></script>
<script type="text/javascript" src="./admin/js/calendar-setup.js" charset="gb2312"></script>
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