<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-10-20
 * Time: 下午3:04
 */
if (isset($_GET["tag"])) {
    $usertag=$_GET["tag"];
    $pattern="/".$usertag."/";
//    read information from the xml file contained the tags information
    // use regrex to match some tags
    // return by xml to the ajax
    $xml=simplexml_load_file("tags.xml");
    $tags=$xml->tags->tag;
//    print_r($tags);
    foreach($tags AS $tag) {

        if (preg_match($pattern,$tag->attributes())) {
            print( $tag->attributes());
            print("/");
        }
    }
} else {
    return;
}

?>