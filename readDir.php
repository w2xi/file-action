<?php 

/**
 * A function I created to recursively get the path of all files and floders including sub-directories of given floders.
 * Though I have not tested it completely, it seems to be working.		
 * @param  string $path [description]
 * @return array        [description]
 */
function read($path)
{
	if ( $handle = opendir($path) ){
		while ( false !== ( $item = readdir($handle) ) ) {
			if ( $item != '.' && $item != '..' ){
				if ( is_file($path."/".$item) ){
					// echo $path."\n";
					$file['file'][] = $path."/".$item;
				}else if ( is_dir($path."/".$item) ){
					$file['dir'][] = $path."/".$item;
					$func = __FUNCTION__;
					$file = array_merge_recursive($file, $func($path."/".$item));
				}
			}
		}
		closedir($handle);
	}

	return $file ?? [];
}
$file = read('E:/wwwroot');
// var_dump('file_count: '.count($file['file']), 'dir_count: '.count($file['dir']));
// var_dump($file);