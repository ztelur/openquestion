<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-10-31
 * Time: 下午3:46
 */
require("../../../lib/php/sqllib.php");
if (isset($_POST["qid"])&&isset($_POST["uid"])&&isset($_POST["content"])&&isset($_POST["uname"])) {
    $sql=sprintf("INSERT INTO answer (qid,author,aname,content) VALUES (%s,%s,'%s','%s')",
                                                mysql_escape_string($_POST["qid"]),
                                                mysql_escape_string($_POST["uid"]),
                                                mysql_escape_string($_POST["uname"]),
                                                mysql_escape_string($_POST["content"]));
    $result=execsql($sql);
    // 更新question的answernum
    $sql=sprintf("UPDATE question SET answernum=answernum+1 WHERE qid=%s",$_POST['qid']);
    $result=execsql($sql);
    echo $result;
}
?>