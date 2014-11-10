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
if (isset($_POST["title"])&&isset($_POST["content"])&&isset($_POST["tagname"])&&isset($_POST["id"])
                            &&isset($_POST["score"])) {
    $filepath="../".$_POST["title"].".php";

    copyfile("../origin/origin.php",$filepath);
    // 处理新的html文件
    //获得用户的姓名
    writeinformation($_POST["title"],$_POST["content"],$_POST["tagname"],$_POST["score"],
                                $_POST["username"],$filepath);

    // need write somthing inot the datbase
    // get the question id from the database
    $qid=writesql($_POST['title'],$_POST["id"],$_POST["tagname"],$_POST["score"]);

    echo $filepath."?qid=".$qid;
}

function writesql($title,$aid,$tagname,$score) {
        //分解tagname
        $tagarray=explode(",",$tagname);
        $tagnumber=encode($tagarray,"../../../lib/php/tags/tags.xml");
        $sql=sprintf("INSERT INTO question (title,uid,tags,score) VALUES ('%s',%s,%s,%s) ",
                                   mysql_escape_string($title),mysql_escape_string($aid),mysql_escape_string($tagnumber),
                                                $score);
        $result=execsql($sql);
            //扣除分数
        $sql=sprintf("UPDATE user SET score=score-%s WHERE uid=%s",$score,mysql_escape_string($aid));
        $result=execsql($sql);
        $sql=sprintf("SELECT qid FROM question WHERE title='%s' AND uid=%s",mysql_escape_string($title),
                                                                                                mysql_escape_string($aid));
        $result=execsql($sql);

        return mysql_fetch_assoc($result)['qid'];
}
function writeinformation($title,$content,$tagname,$score,$username,$path) {
    $html=file_get_html($path);

    $html->find('[class=question-hyperlink]',0)->innertext=$title;
    $html->find('[class=post-text]',0)->innertext=$content;
    $tagarray=explode(",",$tagname);
    foreach($tagarray as $tag) {
        $add=sprintf('<a class="post-tag js-gps-track" title="">%s</a>',$tag);
        $ago=$html->find('[class=post-taglist]',0)->innertext;
        $html->find('[class=post-taglist]',0)->innertext=$ago.$add;
    }
    $html->find('[class=score]',0)->innertext=$score;
    $html->find('[class=relativetime]',0)->innertext=date('Y-m-d H:i:s');
    $html->find("[class=username]",0)->innertext=$username;

//    $html->find('title',0)->innertext="dddd";

    $html->save($path);
}
?>