<?
require("php/check.php");
if (isset($_GET["username"])&&isset($_GET["password"])) {
	checkaccount($_GET["username"],$_GET["password"]);
} elseif (isset($_GET["username"])) {
	checkname($_GET["username"]);
} elseif (isset($_GET["email"])) {
	checkemail($_GET["email"]);
}


?>