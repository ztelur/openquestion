<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-14
 * Time: 下午7:40
 */
require_once("../../lib/php/sqllib.php");
if (isset($_POST["uid"])&&isset($_POST["oldpassword"])&&isset($_POST["password1"])&&isset($_POST["password2"])) {
    $oldpassword=$_POST["oldpassword"];
    $password1=$_POST["password1"];
    $password2=$_POST["password2"];
    $uid=$_POST["uid"];
    if ($password1!=$password2) {
        echo "passwordnotsame";
    } else {

        $sql=sprintf("UPDATE user SET password='%s' WHERE uid=%s AND password='%s'",
                                                            $password1,$uid,$oldpassword);
        $result=execsql($sql);
        if ($result) {
            echo "true";
        }else {
            echo "passworderror";
        }
    }
} else {
    echo "error";
}
?>