<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-3
 * Time: 下午3:08
 */
require("lib/php/sqllib.php");
require("external/simplehtmldom/simple_html_dom.php");
require_once("lib/php/tags/taglib.php");
/*  流程
  *   1  select * from question
 *      2 div id =qid
 *      3 vote innertext= votenum
 *      4 answers innertext=
 *      5 panel-title = title
 *      6 tags
 *      7 started time and author
 *  */
$sql=sprintf("SELECT  qid,uid,title,tags,time,upvote,answernum FROM question");
$result=execsql($sql);
while ($row=mysql_fetch_array($result,MYSQL_ASSOC)) {
    $usersql=sprintf("SELECT username FROM user WHERE uid=%s",$row['uid']);
    $username=mysql_fetch_array(execsql($usersql),MYSQL_ASSOC)['username'];
    $html=file_get_html("question.html");
    // 修改内容
    $tags=decode($row['tags'],"lib/php/tags/tags.xml");
    $html->find("[class=question]",0)->id=$row['qid'];
    $html->find("[class=badge]",0)->innertext=$row['upvote'];
    $html->find("[class=badge]",1)->innertext=$row["answernum"];
    $html->find("[class=panel-title]",0)->innertext=$row["title"];
    $href=sprintf("html/questions/%s.php?qid=%s",$row["title"],$row["qid"]);
    $html->find("[class=panel-title]",0)->href=$href;
    $html->find('[class=author]',0)->innertext=$username;
    $html->find("[class=time]",0)->innertext=$row['time'];
    echo $html;
}
?>