<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-10
 * Time: 下午7:26
 * 提问题的人进行最优答案认定的php
 */
require_once("../sqllib.php");
if (isset($_POST["aid"])&&isset($_POST["qid"])&&isset($_POST["score"])) {
    //问题设为已经adopted
    $sql=sprintf("UPDATE question SET isactive='yes' WHERE qid=%s",$_POST["qid"]);
    execsql($sql);
    //答案设为最优答案
    $sql=sprintf("UPDATE answer SET adopted='yes' WHERE aid=%s",$_POST["aid"]);
    execsql($sql);
    //给答案的主人加分
    $sql=sprintf("SELECT author FROM answer WHERE aid=%s",$_POST["aid"]);
    $result=execsql($sql);
    $uid;
    while ($row=mysql_fetch_array($result,MYSQL_ASSOC)) {
        $uid=$row["author"];
    }
    $sql=sprintf("UPDATE user SET score=score+%s WHERE uid=%s",(int)$_POST["score"],$uid);
    execsql($sql);

    echo 'true';
}
?>