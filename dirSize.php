<?php

/**
 * A function I created to recursively get the size of all files and floders including sub-directories of given floders.
 * @param  string $path [description]
 * @return integer      [description]
 */
function size($path)
{
	static $sum = 0;

	if ( $handle = opendir($path) ){
		while ( false !== ( $item = readdir($handle) ) ) {
			if ( $item != '.' && $item != '..' ){
				$file = $path.'/'.$item;
				if ( is_file($file) ){
					$sum += filesize($file);
				}else if ( is_dir($file) ){
					$func = __FUNCTION__;
					$func($file);
				}
			}
		}
		closedir($handle);
	}

	return $sum;
}

echo size('E:/wwwroot');