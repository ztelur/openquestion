<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-10-31
 * Time: 下午3:07
 */
require("../../lib/php/sqllib.php");
if (isset($_GET["qid"])) {
    global $uid;
    global $title;
    global $upvote;
    global $answernum;
    global $looknum;
    global $qid;
    global $isanswered;
    global $time;
    $isanswered=1;
    // get information from the database
    $sql=sprintf("SELECT * FROM question WHERE qid=%s",mysql_escape_string($_GET['qid']));
    $result=execsql($sql);
    if (mysql_num_rows($result)==1) {
        $row=mysql_fetch_assoc($result);
        $uid=$row["uid"];
        $title=$row["title"];
        $upvote=$row["upvote"];
        $answernum=$row["answernum"];
        $looknum=$row["looknum"];
        $qid=$_GET["qid"];
        $time=$row["time"];
    }
//    看这个人有没有回答过这个问题
    if (isset($_SESSION["user_id"])) {
        $sql = sprintf("SELECT * FROM answer WHERE qid=%s AND author=%s", mysql_escape_string($_GET["qid"]),
            $_SESSION["user_id"]);
        $result = execsql($sql);
//    echo mysql_num_rows($result);
        if (mysql_num_rows($result) >= 1) {
            $isanswered = 2;
        }
        if ($_SESSION["user_id"] == $uid) {
            $isanswered = 3;
        }
    }else {
        $isanswered=1;
    }
}

?>