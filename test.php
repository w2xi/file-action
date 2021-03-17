<?php

/**
 * 产生唯一名称
 * @param int $length
 * @return string
 */
function getUniqidName($length=10){
	return substr(md5(uniqid(microtime(true),true)),0,$length);
}

$arr = [];

for ( $i = 0; $i < 1000000; $i++ )
{
	$arr[] = getUniqidName(10);
}

echo 'count($arr): ' . count($arr) . "\n";
echo 'count(array_unique($arr)): ' . count(array_unique($arr)) . "\n";
