<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-7
 * Time: 上午9:17
 */
if (isset($_GET["uid"])) {
    require_once("../../lib/php/sqllib.php");
    global $uid;
    global $username;
    global $qnum;
    global $anum;
    $sql=sprintf("SELECT username,qnum,anum FROM user WHERE uid=%s",mysql_escape_string($_GET["uid"]));
    $result=execsql($sql);
    if (mysql_num_rows($result)!=1) {
        echo "error no question";
    }else {
        while($row=mysql_fetch_array($result,MYSQL_ASSOC)) {
            $uid = $_GET['uid'];
            $username =$row["username"];
            $qnum=$row["qnum"];
            $anum=$row["anum"];
            }
    }
//

}
?>