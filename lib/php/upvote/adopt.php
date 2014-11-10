<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-10
 * Time: 下午7:26
 * 提问题的人进行最优答案认定的php
 */
require_once("../sqllib.php");
if (isset($_POST["aid"])&&isset($_POST["qid"])) {
    $sql=sprintf("UPDATE question SET isactive='yes' WHERE qid=%s",$_POST["qid"]);
    execsql($sql);
    $sql=sprintf("UPDATE answer SET adopted='yes' WHERE aid=%s",$_POST["aid"]);
    execsql($sql);
    echo 'true';
}
?>