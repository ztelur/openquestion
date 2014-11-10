<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-7
 * Time: 下午4:42
 */
if (isset($GLOBALS["tags"])) {
    $tagslen=count($GLOBALS["tags"]);
    if ($tagslen%2!=0) {
        array_push($GLOBALS['tags'],'');
    }
    for ($i=0;$i<count($GLOBALS["tags"])/2;$i++) {
        $tag1=$GLOBALS["tags"][$i*2];
        $tag2=$GLOBALS['tags'][$i*2+1];
        echo '<tr>';
        echo sprintf('<td><a href="" class="post-tag">%s</a></td>',$tag1);
        if ($tag2!='') {
        echo sprintf('<td><a class="post-tag">%s</a></td>',$tag2);
        }
        echo '</tr>';
    }
} else {
    echo '<div>you have no tags</div>';
}
?>