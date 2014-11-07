<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-3
 * Time: 下午8:24
 */

function encode($tagarray,$path) {
    if (count($tagarray)==0) {
        return 0;
    } else {
        $xml=simplexml_load_file($path);
        $tags=$xml->tags->tag;
        $result=0;
        $value=1;
        foreach ($tags AS $tag) {
            if (in_array($tag->attributes(),$tagarray)) {
                $result=$result+$value;
            }
            $value=$value*10;
        }
        return $result;
    }
}
function decode($value,$path) {
    if ($value==0) {
        return "no";
    } else {
        $xml=simplexml_load_file($path);
        $tags=$xml->tags->tag;
        $tagarray=[];
        $loc=0;
        while($value>=1) {

            if (($value%10)!=0) {   //  is 1
                array_push($tagarray,$tags[$loc]['name']);
            }
            $value=$value/10;
            $loc=$loc+1;
        }
        return $tagarray;
    }
}
?>