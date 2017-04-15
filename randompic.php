<?php
	$imglist=array(); 
	//用$img_folder变量保存图片所在目录，必须用“/”结尾 
	$img_folder = "randomimgs"; 
	mt_srand((double)microtime()*1000); 
	//使用目录类 
	$imgs = dir($img_folder); 
	//检查目录下是否有图片，并生成一个清单 
	while ($file = $imgs->read()) { 
	if (preg_match('/\.(jpg|gif|bmp|png|jpeg)/i', $file)) 
		array_push($imglist,$file); 
	} 
	closedir($imgs->handle); 
	$image = $imglist[array_rand($imglist)];
	//输出结果 
     //readfile($img_folder.'/'.$image);
	 header("Location: http://blog.ch-wind.com/wp-content/themes/utage/randomimgs/".$image);
?>