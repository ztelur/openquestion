<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-7
 * Time: 下午3:24
 */
require_once("../../lib/php/sqllib.php");
if (isset($_GET["uid"])) {
    $sql=sprintf("SELECT q.qid,q.title,a.upvote FROM answer  a JOIN question q
                                                                                                ON a.qid=q.qid
                                WHERE a.author=%s",$_GET["uid"]);
    $result=execsql($sql);
    if (mysql_num_rows($result)<1) {
        echo '<div class="empty">you have no answers</div>';
    } else {
        echo '<table class="user-answers lines">
                                <tbody>';
        while($row=mysql_fetch_array($result,MYSQL_ASSOC)) {
            $count=$row["upvote"];
            $href='../questions/'.urlencode($row['title']).'.php?qid='.urlencode($row['qid']);

             $add=sprintf("<tr>
                                        <td class='count-cell'>%s</td>
                                        <td class='question-hyperlink' qid='%s'>
                                            <a href='%s' class='question-hyperlink'>%s</a>
                                        </td>
                                    </tr>",$row["upvote"],$row["qid"],$href,$row["title"]);
             echo $add;
        }
        echo '</tbody></table>';
    }
}
?>