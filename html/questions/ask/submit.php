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
require_once("../../../lib/php/tags/taglib.php");
//TODO: 主要要有一个return的url，可以直接跳转到来的地方
if (isset($_POST["title"])&&isset($_POST["content"])&&isset($_POST["tagname"])&&isset($_POST["id"])) {
    $filepath="../".$_POST["title"].".php";

    copyfile("../origin/origin.php",$filepath);
    // 处理新的html文件

    writeinformation($_POST["title"],$_POST["content"],$_POST["tagname"],$filepath);
    // need write somthing inot the datbase
    // get the question id from the database
    $qid=writesql($_POST['title'],$_POST["id"],$_POST["tagname"]);

    echo $filepath."?qid=".$qid;
}

function writesql($title,$aid,$tagname) {
        //分解tagname
        $tagarray=explode(",",$tagname);
        $tagnumber=encode($tagarray,"../../../lib/php/tags/tags.xml");
        $sql=sprintf("INSERT INTO question (title,uid,tags) VALUES ('%s',%s,%s) ",
                                   mysql_escape_string($title),mysql_escape_string($aid),mysql_escape_string($tagnumber));
        $result=execsql($sql);
        $sql=sprintf("SELECT qid FROM question WHERE title='%s' AND uid=%s",mysql_escape_string($title),
                                                                                                mysql_escape_string($aid));
        $result=execsql($sql);
        return mysql_fetch_assoc($result)['qid'];
}
function gettagcode($tags) {

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