<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-6
 * Time: 下午4:43
 */
/*
 *  1 选取
 *
 * */
require_once("../../lib/php/sqllib.php");
require_once("../../external/simplehtmldom/simple_html_dom.php");
require_once("../../lib/php/tags/taglib.php");
global $searchnum;
if (isset($_POST['search'])) {

    $sql = sprintf("SELECT * FROM question WHERE title LIKE '%%%s%%'", mysql_real_escape_string($_POST['search']));

    $result = execsql($sql);
    $searchnum=mysql_num_rows($result);
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $usersql = sprintf("SELECT username FROM user WHERE uid=%s", $row['uid']);
        $username = mysql_fetch_array(execsql($usersql), MYSQL_ASSOC)['username'];
        $html = file_get_html("question.html");
        // 修改内容
        $tags = decode($row['tags'], "../../lib/php/tags/tags.xml");
        $html->find("[class=question]", 0)->id = $row['qid'];
        $html->find("[class=badge]", 0)->innertext = $row['upvote'];
        $html->find("[class=badge]", 1)->innertext = $row["answernum"];
        $html->find("[class=panel-title]", 0)->innertext = $row["title"];
        $href = sprintf("html/questions/%s.php?qid=%s", $row["qid"], $row["qid"]);
        $html->find("[class=panel-title]", 0)->href = $href;
        $html->find('[class=author]', 0)->innertext = $username;
        $html->find("[class=time]", 0)->innertext = $row['time'];
        echo $html;
    }
}
?>