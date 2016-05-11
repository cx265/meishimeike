<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <title>每十云课堂</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="author" content="terry - gbin1.com">
		<meta name="description" content="HTML5 webcam demo">
		<meta name="keywords" content="HTML5,webcam,gbin1.com, gbin1, gbtags">
		<link rel="stylesheet" href="css/jquery.qtip.css" type="text/css" media="screen">
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/photobooth_min.js"></script>
		<script type="text/javascript" src="js/jquery.qtip.min.js"></script>
		<script type="text/javascript" src="js/gbin1.js"></script>
		<style>
			body{
				font-size:12px;
				background: #333;
				font-family: 'Revalia', cursive, arial;
			}
			
			div#pictures,div#webcam{
				margin: 10px 0 0;
			}
			
			h1{
				margin: 20px 0;
			}
			
			div#from{
				margin:20px 0px;
			}
			
			div#from a{
				color: #FFF;
				font-size:12px;
				background: #1557C3;
				margin: 20px 0;
				border-radius: 5px;
				padding:10px;
				line-height: 25px;
			}
			
			h1 a{
				background: #333;
				border-radius: 5px;
				padding: 5px;
				float:right;
				cursor: hand;
				color: #FFF;
				text-decoration: none;
				margin-left: 20px;
			}
			
			#main{
				width: 800px;
				margin: 10px auto;
				background: #FFF;
				color: #333;
				border: 2px solid #FFF;
				box-shadow: 0px 0px 10px #CCC;
				padding:20px;
				border-radius: 5px;
			}
			
			#main article{
				margin-bottom: 50px;
				background: #F8F8F8;
				border-radius: 5px;
				padding:20px;
				border: 1px solid #bbb;
			}
			
			#main #webcam{
				height: 400px;
				width: 100%;
			}
			
			#main #plist{
				margin: 20px 0;
				font-weight: bold;
				border-radius: 5px;
				background: #CCC;
				padding:10px;
			}
			
			#main img{
				margin-bottom: 50px;
				background: #F8F8F8;
				border-radius: 10px;
				box-shadow: 0px 0px 5px #888;
			}			
			
			.clear{
				clear:both;
			}
			
			#main ul{
				list-style:none;
				margin:0;
				padding:0;
			}
			
			#main .photobooth{
				border: 1px solid #ccc;
				border-radius: 5px;
			}
			#txt{
				display: inline-block;
				width: 250px;
				border: none;
			}
		</style>
<script type="text/javascript">
var c=0
var t
function timedCount()
{
   var temptextmin=document.getElementById('txt');
	hour = parseInt(c / 3600);// 小时数
	min = parseInt(c / 60);// 分钟数
	if(min>=60){
	    min=min%60
	}
	lastsecs = c % 60;


temptextmin.value = hour + "时" + min + "分" + lastsecs + "秒"

c=c+1
t=setTimeout("timedCount()",1000)
document.getElementById('start').style.display = "none";   
document.getElementById('end').style.display = ""; 


}

function stopCount()
{
clearTimeout(t)
document.getElementById('start').style.display = "";   
document.getElementById('end').style.display = "none"; 
}
function clearAll(){
 c=0
 document.getElementById('txt').value=  "0时" +  "0分" + "0秒"
 clearTimeout(t)
 document.getElementById('start').style.display ="";   
 document.getElementById('end').style.display = "none"; 
 alert('视频已被删除！');
}
function up(){
c=0
document.getElementById('txt').value=  "0时" +  "0分" + "0秒"
 clearTimeout(t)
 document.getElementById('start').style.display ="";   
 document.getElementById('end').style.display = "none"; 
 alert('视频和图片已被保存在本地文件夹\'upload\'中！');
 document.window.close();
}
</script>
	</head> 
	<body>
		
		<section id="main">
			<h1>你想要使用你的摄像头吗？</h1>
			<article>
			<div id="webcam"></div>
			<form>
			<input type="text" id="txt" value="0时0分0秒">
			<input type="button" value="开始录制！" id="start" onClick="timedCount()">
			<input type="button" value="暂停录制！" style="display: none" id="end" onClick="stopCount()">
			<input type="button" value="取消录制" onClick="clearAll()">
			<input type="button" value="终止录制" onClick="up()">
			</form>
			<div id="plist"> 照片列表 </div>
			<div id="pictures"><div class="nopic">没有照片</div></div>
			<div class="clear"></div>
			</article>
		</section>
	</body>	
</html>