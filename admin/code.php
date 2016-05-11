<?php
    session_start();
    $img_height=65;
    $img_width=30;

    $_str = 'ABCDEFGHIJKLMNPQRSTUVWXYZ0123456789';
    $_i = strlen($_str);
    $_authnum = '';
    for ($i=0; $i < 4; $i++) {
        $_num = rand(0,$_i-1);
        $_authnum.= $_str[$_num];
    }

    $_SESSION['auth'] = $_authnum;

    $img = imageCreate($img_height,$img_width);
    ImageColorAllocate($img, 255,255,255);
    $black = ImageColorAllocate($img, 0,0,0);

	for($i=0;$i<6;$i++) {
		$te=imagecolorallocate($img,rand(0,255),rand(0,255),rand(0,255));
		imageline($img,rand(0,60),rand(0,60),rand(0,60),rand(0,60),$te);
	}

    for ($i=1; $i<=100; $i++) {
         imageString($img,1,mt_rand(1,$img_height),mt_rand(1,$img_width),"*",imageColorAllocate($img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255)));
    }

    for ($i=0;$i<strlen($_SESSION['auth']);$i++){
         imageString($img, mt_rand(5,6),$i*$img_height/4+mt_rand(1,10),mt_rand(1,$img_width/2), $_SESSION['auth'][$i],imageColorAllocate($img,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200)));
    }
    for ($i=0; $i < 1; $i++) {
        $line_color = ImageColorAllocate($img, rand(0,155),rand(0,155),rand(0,155)); 
        imageline($img, 0, rand(0,18), 55,rand(0,18), $line_color);
        $line_color = ImageColorAllocate($img, rand(0,155),rand(0,155),rand(0,155)); 
        imageline($img, rand(0,55), 0, rand(0,55),18, $line_color);
    }

    Header("Content-type: image/png");
    ImagePng($img);
    ImageDestroy($img);

?>