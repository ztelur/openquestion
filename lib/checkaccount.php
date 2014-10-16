<?
require("php/check.php");
if (isset($_GET["username"])&&isset($_GET["email"])&&isset($_GET["password1"])&&isset($_GET["password2"])) {
	checkregister($_GET["username"],$_GET["email"],$_GET["password1"],$_GET["password2"]);
}elseif (isset($_GET["username"])&&isset($_GET["password"])) {
	checkaccount($_GET["username"],$_GET["password"]);
} elseif (isset($_GET["username"])) {
	checkname($_GET["username"]);
} elseif (isset($_GET["email"])) {
	checkemail($_GET["email"]);
}


?>