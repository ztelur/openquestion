<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-10-21
 * Time: 下午2:48
 */
require("../../../lib/php/Filesystem.php");
require("../../../external/simplehtmldom/simple_html_dom.php");
require("../../../lib/php/sqllib.php");
if (isset($_POST["title"])&&isset($_POST["content"])&&isset($_POST["tagname"])) {
    $filepath="../".$_POST["title"].".php";

    copyfile("../origin/origin.php",$filepath);
    // 处理新的html文件

    writeinformation($_POST["title"],$_POST["content"],$_POST["tagname"],$filepath);
    // need write somthing inot the datbase
    $qid="123456789123";
    $aid="1234567890";
    echo $filepath;
    writesql($_POST['title'],$_POST['tagname'],$qid,$aid);
}
function writesql($title,$tagname,$qid,$aid) {
        $sql=sprintf("INSERT INTO question (qid,title,label,aid) VALUES ('%s','%s','%s','%s') ",mysql_escape_string($qid),
                                   mysql_escape_string($title),mysql_escape_string($tagname),mysql_escape_string($aid));
        $result=execsql($sql);
//        echo $result;
}
function writeinformation($title,$content,$tagname,$path) {
    $html=file_get_html($path);

    $html->find('[class=question-hyperlink]',0)->innertext=$title;
    $html->find('[class=post-text]',0)->innertext=$content;
    $html->find('[class=post-taglist]',0)->innertext=$tagname;
//    $html->find('title',0)->innertext="dddd";

    $html->save($path);
}
?>