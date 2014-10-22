<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-10-21
 * Time: 下午3:24
 */
function createdir($path){
    if (!file_exists($path)) {
        $result=mkdir($path);
    }
    return $result;
}

/** 复制文件
 * @param $source  源地址
 * @param $dest　　目的地址
 * 如果目的地址已经有文件，则覆盖
 */
function copyfile($source,$dest) {
    if (!file_exists($source)) {
        return false;
    }
    if (file_exists($dest)) {
        unlink($dest);
    }
    copy($source,$dest);
    return true;
}
?>