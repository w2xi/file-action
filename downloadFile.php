<?php 


/**
 * 下载文件操作
 * 更多详情参考：
 * https://www.php.net/manual/zh/function.readfile.php
 * @param string $filename
 */
function downloadFile($filename){
	header("content-disposition:attachment;filename=\"".basename($filename).'"');
	header("content-length:".filesize($filename));
	readfile($filename);
}
$default_file = 'E:/wallpaper/wallhaven-5dedx3_1920x1080.png';
downloadFile($default_file );