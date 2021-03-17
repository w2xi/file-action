<?php 

/**
 * A function I created to recursively copy all files and floders including sub-direcroties given floders to destination. 
 * @param  [type] $source [description]
 * @param  [type] $dest   [description]
 * @return [type]         [description]
 */
function copyDir($source, $dest)
{
	if ( !file_exists($dest) ){
		mkdir($dest, 0777, true);
	}
	if ( $handle = opendir($source) ){
		while ( false !== ( $item = readdir($handle) ) ){
			if ( $item != '.' && $item != '..' ){
				$file = $source . '/' . $item;
				if ( is_file($file) ){
					copy($file, $dest.'/'.$item);
				}elseif ( is_dir($file) ){
					$func = __FUNCTION__;
					$func($file, $dest.'/'.$item);
				}
			}
		}
		closedir($handle);
	}
	return 'created successfully';
}

echo copyDir('E:/wallpaper', 'E:/myVideo/wallpaper');