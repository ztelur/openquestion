<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-10-27
 * Time: 下午2:47
 * 通过遍历数据库来给页面添加问题所属的答案
 */
/*1 获得页面问题的数据库主键号
 * 2 通过问题主键，遍历answers表，找到所有的此问题的答案
 * 3 使用simple dom php 来添加answer。使用循环
 *          3.1 读入answers的预设html代码 $html = str_get_html;
 *          3.2 更加数据库中读入的数据依次修改answer中的下列属性
 *                  3.3 data-answerid:主键值，post-text：内容等一些东西，
 *          3.3 写入origin.php中。
 * */
require_once("../../lib/php/sqllib.php");
require("../../external/simplehtmldom/simple_html_dom.php");
global $isquestioner;
function handleAnswers($id,$active) {
    $sql=sprintf("SELECT aid,qid,author,aname,time,upvote,adopted,content FROM answer WHERE qid=%s",mysql_escape_string($id));
    $result=execsql($sql);
    if ($result!==null) {
        if (mysql_num_rows($result)==0) {

        }else {
            writeAnswers($result,$active);
        }
    }
}
function writeAnswers($result,$active) {
    $isquestioner=false;

    if (isset($_SESSION["user_id"])) {
        if ($GLOBALS["uid"] == $_SESSION["user_id"]) {
            $isquestioner = true;
        }
    }
//    $row=mysql_fetch_array($result);
    while ($row=mysql_fetch_array($result,MYSQL_ASSOC)) {
                    //判断当前浏览用户是否为提问题的用户,而且要首先判断此时用户是否登陆啦
        $adopt=$row["adopted"];
        if (($isquestioner&&$active)||$adopt=='yes') {  //如果登陆的是提问的人,并且问题还没有设定最佳答案||此答案已经被采纳
            $html = file_get_html("origin/answer2.html");
        }else {
            $html=file_get_html("origin/answer.html");
        }
        // 修改内容
        $aid=$row["aid"];

        $html->find('.votecell',0)->id=$aid;
        $html->find("[class=aid]",0)->value=$aid;

        $html->find('[class=post-text]',0)->innertext=$row["content"];
        $html->find('[class=avote-count-post]',0)->innertext=$row["upvote"];
        $html->find('[class=username]',0)->innertext=$row["aname"];
        $html->find("[class=relativetime]",0)->innertext=$row["time"];
        //写入origin.php
        echo $html;
    }

}
?>