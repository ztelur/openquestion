<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-5
 * Time: 下午7:02
 */
require_once("../sqllib.php");
if (isset($_POST["qid"])&&isset($_POST["uid"])) {
    $sql=sprintf("SELECT * FROM questionupvote WHERE qid=%s AND uid=%s",
                                    mysql_escape_string($_POST["qid"]),mysql_escape_string($_POST["uid"]));
    $result=execsql($sql);
    if (mysql_num_rows($result)==1) {
        echo "false";
    } else {
        echo "true";
        $sql=sprintf("INSERT INTO questionupvote (qid,uid) VALUES (%s,%s)",
                                mysql_escape_string($_POST["qid"]),mysql_escape_string($_POST['uid']));
        execsql($sql);
        if ($_POST['up']) {
            $sql = sprintf("UPDATE question SET upvote=upvote+1 WHERE qid=%s",
                mysql_escape_string($_POST["qid"]));
        } else {
            $sql = sprintf("UPDATE question SET upvote=upvote-1 WHERE qid=%s",
                mysql_escape_string($_POST["qid"]));
        }
            execsql($sql);
    }
}
if (isset($_POST["aid"])&&isset($_POST["uid"])) {

    $sql=sprintf("SELECT * FROM answerupvote WHERE aid=%s AND uid=%s",
                                    mysql_escape_string($_POST["aid"]),mysql_escape_string($_POST["uid"]));
    $result=execsql($sql);
    if (mysql_num_rows($result)==1) {
        echo "false";
    } else {
        echo "true";
        $sql=sprintf("INSERT INTO answerupvote (aid,uid) VALUES (%s,%s)",
                                mysql_escape_string($_POST["aid"]),mysql_escape_string($_POST['uid']));
        execsql($sql);
        if ($_POST['up']) {
            $sql = sprintf("UPDATE answer SET upvote=upvote+1 WHERE aid=%s",
                mysql_escape_string($_POST["aid"]));
        } else {
            $sql = sprintf("UPDATE answer SET upvote=upvote-1 WHERE aid=%s",
                mysql_escape_string($_POST["aid"]));
        }
            execsql($sql);
    }
}
?>