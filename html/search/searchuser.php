<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-16
 * Time: 下午4:59
 */
require_once("../../lib/php/sqllib.php");
require_once("../../external/simplehtmldom/simple_html_dom.php");
if (isset($_GET["user"])) {
    $sql=sprintf("SELECT uid,username,qnum,anum,score FROM user WHERE username LIKE '%%%s%%'",
                                                                                                                    mysql_real_escape_string($_GET["user"]));
    $result=execsql($sql);
    while($row=mysql_fetch_array($result,MYSQL_ASSOC)) {
        $html=file_get_html("users.html");
         $html->find("[class=question]", 0)->id = $row['uid'];
         $html->find("[class=badge]", 0)->innertext = $row['qnum'];
        $html->find("[class=badge]", 1)->innertext = $row["anum"];
        $html->find("[class=panel-title]", 0)->innertext = $row["username"];
        $href = sprintf("html/user/user.php?uid=%s",  $row["uid"]);
        echo $html;
    }
    echo "ddddddddddddddddddddd";
}
?>