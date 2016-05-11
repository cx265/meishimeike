<?php
error_reporting(0);
    header("Content-Type: text/html; charset=utf-8");
    require("connect.php");
    $_upload_user = $_COOKIE['user'];
    $_filetype = $_POST['type'];
    $_comment = $_POST['comments'];

if ($_POST['submit']){
    echo "<pre>";

    $_img = $_FILES['img'];
    $_file = $_FILES['upload'];

    if ($_file['error']>0 || $_img['error']>0) {
        echo "错误！上传失败...\n";
        switch($_file['error']||$_img['error'])
        {
            case 1: echo '没有发现上传的文件！'; break;
            case 2: echo '文件超过允许的最大上传限度！'; break;
            case 3: echo '只有部分文件被上传！'; break;
            case 4: echo '没有任何文件被上传！'; break;
        }
        echo "<input type='button' value='返回' onclick=window.location.href='MicorClass.php?answer=c2'>";
        exit();
    }
    if($_file['size'] > 5001024000){
        echo "上传的视频文件太大了！\n"."文件大小为：".$_file['size'];
        echo "<input type='button' value='返回' onclick=window.location.href='MicorClass.php?answer=c2'>";
        exit();
    }
    if($_img['size'] > 21024000){
        echo "上传的视频图片太大了！\n"."图片大小为：".$_img['size'];
        echo "<input type='button' value='返回' onclick=window.location.href='MicorClass.php?answer=c2'>";
        exit();
    }

    if(!is_uploaded_file($_file['tmp_name']) || !is_uploaded_file($_img['tmp_name'])){
        echo ("视频文件没有上传成功！");
        echo "<input type='button' value='返回' onclick=window.location.href='MicorClass.php?answer=c2'>";
        exit();
    }

    $_type = strstr($_img['name'], ".");
    $_type = str_replace('.','',$_type);
    switch ($_type) {
        case 'jpg':
        case 'gif':
        case 'png':
            $_upload_dirs = '../upload/images/videoimg/';
            break;
        default:
            echo "图片格式不正确！\n"."上传的图片格式是：".$_type."\n";
            echo "<input type='button' value='返回' onclick=window.location.href='MicorClass.php?answer=c2'>";
            exit();
    }
    $_today = date('YmdHis',time()).rand(100,999);
    $_name = iconv('utf-8', 'gb2312', $_img['name']);
    $_uploadfiles = $_upload_dirs.$_today.$_name;
    $_saves = $_today.$_img['name'];

    $_type = strstr($_file['name'],".");
    $_type = str_replace('.','',$_type);
    switch ($_type) {
        case 'flv':
        case 'f4v':
            $_upload_dir = '../upload/video/';
            break;
        default:
            echo "视频文件格式不正确！\n"."上传的视频格式是：".$_type."\n";
            echo "<input type='button' value='返回' onclick=window.location.href='MicorClass.php?answer=c2'>";
            exit();
    }
    $_name = iconv('utf-8', 'gb2312', $_file['name']);
    $_uploadfile = $_upload_dir.$_today.$_name;
    $_save = $_today.$_file['name'];
    $_theme = $_file['name'];
    $_theme = str_replace('.flv', '', $_theme);
    $_theme = str_replace('.f4v', '', $_theme);

    if ((move_uploaded_file($_file['tmp_name'], $_uploadfile)) && (move_uploaded_file($_img['tmp_name'], $_uploadfiles)))
    {
        echo "上传成功！\n";
        $_result = mysql_query("INSERT INTO video (video_uploader,theme,video_name,video_img,video_type,video_content,video_time,video_playcount,status) VALUES ('$_upload_user','$_theme','$_save','$_saves','$_filetype','$_comment',NOW(),'0','1')");
        if ($_result) {
            echo "视频发布成功!\n";
        }
        echo "<meta http-equiv=\"refresh\" content=\"3;url=MicorClass.php?answer=c2\">将在3秒钟后返回首页...";
    }
    else
    {
        echo "文件无法复制！\n";
		echo "<input type='button' value='返回' onclick=window.location.href='MicorClass.php?answer=c2'>";
    }
    echo "</pre>";

}else{
    echo "<script language='javascript'>alert('视频没有被提交！');window.location.href='MicorClass.php?answer=c2'</script>";
}
?>