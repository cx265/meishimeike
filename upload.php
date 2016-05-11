<?php
	require("./admin/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>每十云课堂</title>
	<style type="text/css">
		.up-box{width: 720px;
		        height: 560px;
		       border: solid 1px silver;
		       margin: 0 auto;
		       background: #F5F5F5;
		   font-family:Tahoma,Helvetica,"Microsoft Yahei","微软雅黑",Arial,STHeiti;}
		.center-box{width: 720px;
				        height: 100px;
				       border: solid 1px silver;
				       margin: 20px auto;
				    background: #F5F5F5;}
				    .left{
				    	height: 80px;
				    	width: 300px;
				    	float: left;
				    	margin-left:20px;
				    }
		
		.down-box{width: 720px;
				        height:150px;
				       border: solid 1px silver;
				       margin: 30px auto;
				    background: #F5F5F5;}		 
       .sc{
			width: auto;
			height: 34px;
			padding: 0 15px;
			font-weight: bold;
			background: url(admin/img/button.gif) repeat-x 0 0;
			cursor: pointer;
			border: none;
			color: #FFFFFF;
			text-shadow: 1px 1px #45add8;
			vertical-align: middle;
			margin-left: 300px;
}
p{color: #666;margin-left:20px; font-size: 14px;}
tr.cont_box,tr.cont_boxs,tr.cont_boxss{
	display: none;
}

	</style>
	<script type="text/javascript" >
		function cont_show(){
		    var a=document.getElementById("cont_box");
		    a.className="cont_box_";
		} 
		function cont_shows(){
		    var a=document.getElementById("cont_boxs");
		    a.className="cont_box_";
		} 
		function cont_showss(){
		    var a=document.getElementById("cont_boxss");
		    a.className="cont_box_";
		}
		function cont_hidden(){
		    var a=document.getElementById("cont_box");
		    a.className="cont_box";
		} 
		function cont_hiddens(){
		    var a=document.getElementById("cont_boxs");
		    a.className="cont_box";
		} 
		function cont_hiddenss(){
		    var a=document.getElementById("cont_boxss");
		    a.className="cont_box";
		} 
	</script>
</head>
<body>
    <div class="up-box">
     <form enctype="multipart/form-data" action="upload_check.php" method="post">
		    <table border="0" style="margin:30px auto;" cellpadding="13">
		    	<tr>
		    		<td>视频文件:</td>
		    		<td><input name="upload" type="file" ><img width="18" height="18" src="images/100.png" onclick="cont_show()"></td>
		    	</tr>
		    	<tr id="cont_box" class="cont_box">
		    		<td>视频文件:</td>
		    		<td><input name="upload1" type="file" ><img width="18" height="18" src="images/100.png" onclick="cont_shows()">&nbsp;&nbsp;<img width="18" height="18" src="images/101.png" onclick="cont_hidden()"></td>
		    	</tr>
		    	<tr id="cont_boxs" class="cont_boxs">
		    		<td>视频文件:</td>
		    		<td><input name="upload2" type="file" ><img width="18" height="18" src="images/100.png" onclick="cont_showss()">&nbsp;&nbsp;<img width="18" height="18" src="images/101.png" onclick="cont_hiddens()"></td>
		    	</tr>
		    	<tr id="cont_boxss" class="cont_boxss">
		    		<td>视频文件:</td>
		    		<td><input name="upload3" type="file" ><img width="18" height="18" src="images/100.png">&nbsp;&nbsp;<img width="18" height="18" src="images/101.png" onclick="cont_hiddenss()"></td>
		    	</tr>
		    	<tr>
		    		<td>视频类型:</td>
		    		<td><select class="big" name="big">
						  <option value="">- -选择类型- -</option>
						  <option value="软件开发">编程语言</option>
						  <option value="数据库">数据库</option>
						  <option value="嵌入式开发">嵌入式开发</option>
						  <option value="图形艺术">图形艺术</option>
						  <option value="动画">动画</option>
						  <option value="网站建设">网站建设</option>
						  <option value="其它">其它</option>
						</select>
						<select class="small" name="sort">
						  <option value="">- -选择类型- -</option>
						  <option value="java">java</option>
						  <option value="c">c</option>
						  <option value="PHP">PHP</option>
						  <option value="jQuery">jsp</option>
						  <option value="javascript">c++</option>
						  <option value=".NET">.NET</option>
						  <option value="Ajax">c#</option>
						  <option value="VB">VB</option>
						  <option value="其它">其它</option>
						</select>
                    </td>
		    	</tr>
		    	<tr>
		    		<td>视频图片:</td>
		    		<td><input name="img" type="file"></td>
		    	</tr>
		    	<tr>
		    		<td>视频简介:</td>
		    		<td><textarea rows="10" cols="50" name="content"></textarea></td>
		    	</tr>
		    	<tr>
		    		<td>版权所有:</td>
		    		<td><input type="radio" checked="checked" name="copyright" value="own"/>原创
<input type="radio" name="copyright" value="turn"  />转载</td>
		    	</tr>
		    </table>
		    <hr size="1" style="color:silver; width:500px; ">
		   <input name= "upload" type="submit" value="确认上传" class="sc">
		</form>
    </div>
    <div class="center-box">
       <div class="left">
       	 <img src="images/logo1.png">

       </div> <p>《每十云课堂》支持所有人上传符合格式的文件，我们会对视频做进一步的审核！</p>
    </div>
     <div class="down-box">
     <h2 style="margin-left:20px;">说明</h2>
     <p>支持视频格式:*flv *f4v &nbsp;&nbsp;&nbsp;&nbsp;大小:500M以内</p>
      <p>图片格式:*jpg *gif *png&nbsp;&nbsp;&nbsp;&nbsp;大小:10M以内</p>
    </div>
</body>
</html>