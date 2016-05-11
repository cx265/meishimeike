<?php
error_reporting(0);
header("Content-Type:text/html; charset=utf-8");
require("./connect.php");
	$_id = $_GET['id'];
	$_result = mysql_query("SELECT * FROM video WHERE id='$_id' LIMIT 1");
	$_row = mysql_fetch_array($_result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>每十每课</title>
  <script type="text/javascript" src="../flowplayer/example/flowplayer-3.2.6.min.js"></script>
</head>
<body>
	<div>
		<a href="../upload/video/<?php echo($_row['video_name']);?>" style="display:block;width:600px;height:450px;" id="player"></a>
		<script type="text/javascript">
		flowplayer("player","../flowplayer/flowplayer-3.2.7.swf",{
  			clip:{
	    		autoPlay:false,
	    		autoBuffering:true
  			},
  			plugins: {
	            controls: {
	                bottom: 0,//功能条距底部的距离
	                height: 24, //功能条高度
	                zIndex: 1,
	                fontColor: '#ffffff',
	                timeFontColor: '#333333',
	                playlist: true,//上一个、下一个按钮
	                play:true, //开始按钮
	                volume: true, //音量按钮
	                mute: true, //静音按钮
	                stop: true,//停止按钮
	                fullscreen: true, //全屏按钮
	                scrubber: true,//进度条
	                url: "flowplayer.controls-3.2.5.swf", //决定功能条的显示样式（功能条swf文件,根据项目定亦可引用:http://releases.flowplayer.org/swf/flowplayer.controls-3.2.12.swf）
	                time: true, //是否显示时间信息
	                autoHide: true, //功能条是否自动隐藏
	                backgroundColor: '#aedaff', //背景颜色
	                backgroundGradient: [0.1, 0.1, 1.0], //背景颜色渐变度（等分的点渐变）
	                opacity: 0.5, //功能条的透明度
	                borderRadius: '30',//功能条边角
	            tooltips: {
	                buttons: true,//是否显示
	                fullscreen: '全屏',//全屏按钮，鼠标指上时显示的文本
	                stop:'停止',
	                play:'开始',
	                volume:'音量',
	                mute: '静音',
	                next:'下一个',
	                previous:'上一个'
				}
			}
		}
  	// onFinish: function() {
    //      alert("恭喜！你已近看完了！");
    //  }
 		});
		</script>
	</div>
</body>
</html>