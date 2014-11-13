<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-7
 * Time: 下午3:24
 */
require_once("../../lib/php/sqllib.php");
require_once("../../lib/php/tags/taglib.php");
global $tags;
$tags=[];
if (isset($_GET["uid"])){
$sql=sprintf("SELECT qid,title,upvote,tags FROM question WHERE uid=%s",mysql_escape_string($_GET["uid"]));
    $result=execsql($sql);
    if (mysql_num_rows($result)<1) {
        echo "<td>you have no post the question</td>";
    } else {
        echo '<table class="user-answers lines">
                                <tbody>';
        while($row=mysql_fetch_array($result,MYSQL_ASSOC)) {
            $count=$row["upvote"];
            $href='../questions/'.urlencode($row['qid']).'.php?qid='.urlencode($row['qid']);
            $taglists=decode($row["tags"],'../../lib/php/tags/tags.xml');

            foreach ($taglists as $elem ) {
                $key=(string)$elem;
                if (!in_array($key,$tags)) {
                    array_push($tags,$key);
                }
            }
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