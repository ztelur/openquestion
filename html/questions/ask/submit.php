<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-10-21
 * Time: 下午2:48
 */
require("../../../lib/php/Filesystem.php");
require("../../../external/simplehtmldom/simple_html_dom.php");

if (isset($_POST["title"])&&isset($_POST["tagname"])) {
    $filepath="../".$_POST["title"].".html";
    echo $filepath;
    copyfile("../origin.html",$filepath);
    // 处理新的html文件
    $_POST["content"]="ddddd";
    writeinformation($_POST["title"],$_POST["content"],$_POST["tagname"],$filepath);
    header("Location:".$filepath);
}
function writeinformation($title,$content,$tagname,$path) {
    $html=file_get_html($path);

    echo $html->find('[class=question-hyperlink]',0)->innertext=$title;
    $html->find('[class=post-text]',0)->innertext="dddd";
    $html->find('[class=post-taglist]',0)->innertext=$tagname;
//    $html->find('title',0)->innertext="dddd";

    $html->save($path);
}
?>