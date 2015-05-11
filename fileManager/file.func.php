<?php
/**
 * 转换字节大小
 * User: Zhao Shanshan
 * Date: 2015/5/10
 * Time: 22:19
 * @param number $size
 * @return string
 */
function transByte($size) {
    $arr = array("B","KB","MB","GB","TB");
    $i = 0;
    while($size>1024) {
        $size /= 1024;
        $i++;
    }
    return round($size,2).$arr[$i];
}
/*
$size = 10092;
var_dump(transByte($size));*/