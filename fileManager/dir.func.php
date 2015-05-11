<?php
// open dir
function readDirectory($path) {
	$handle = opendir($path);
//    $arr['file'][] = null;
//    $arr['dir'][] = null;
	while(($item = readdir($handle)) !== false) {// 不全等于
		// .和.. 两个特殊目录
		if($item != "." && $item != ".."){
			if(is_file($path."/".$item)) {
				$arr['file'][] = $item;
			}
			if(is_dir($path."/".$item)) {
				$arr['dir'][] = $item;
			}
		}
	}
	closedir($handle);
	return $arr;
}
/*echo __FILE__;
$path = "file";
var_dump(readDirectory($path));*/