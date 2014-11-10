<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-8
 * Time: 上午11:04
 */
require_once("../../../lib/php/sqllib.php");
if (isset($_GET["score"])&&isset($_GET["uid"])) {
    $sql=sprintf("SELECT score FROM user WHERE uid=%s",mysql_escape_string($_GET["uid"]));
    $result=execsql($sql);
    while($row=mysql_fetch_array($result,MYSQL_ASSOC)) {
        $user_score=$row["score"];
        if ($_GET["score"]>$user_score) {
            echo false;
        } else {
            echo true;
        }
    }
}
?>