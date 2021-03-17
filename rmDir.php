<?php 

/**
 * A function I created to remove all files and floders including sub-directories of given floders
 * @param  [type] $path [description]
 * @return [type]       [description]
 */
function removeDir($path)
{
	if ( !is_dir($path) ){
		mkdir($path, 0777, true);
	}
	if ( $handle = opendir($path) ){
		while ( false !== ( $item = readdir($handle) ) ) {
			if ( $item != '.' && $item != '..' ){
				$file = $path . '/' . $item;
				if ( is_file($file) ){
					unlink($file);
				}elseif ( is_dir($file) ){
					$func = __FUNCTION__;
					$func($file);
				}
			}
		}
		closedir($handle);
	}
	rmdir($path);

	return 'remove dir successfully';
}

echo removeDir('E:/myVideo/wallpaper');