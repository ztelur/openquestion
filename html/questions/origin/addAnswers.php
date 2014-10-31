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
require("../../../lib/php/sqllib.php");
require("../../../external/simplehtmldom");

function handleAnswers($id) {
    $sql=sprintf("SELECT aid,qid,author,aname,upvote,adopted,content FROM answer WHERE qid=%s",mysql_escape_string($id));
    $result=execsql($sql);
    if ($result!==null) {
        if (mysql_num_rows($result)==0) {
//            标示没有答案
        }else {
            writeAnswers($result);
        }
    }
}
function writeAnswers($result) {
//    $row=mysql_fetch_array($result);
    while ($row=mysql_fetch_array($result,MYSQL_ASSOC)) {  //遍历每个answer
        
        $html=file_get_html("answer.html");
        // 修改内容
        $html->find('');
        //写入origin.php

    }

}
?>