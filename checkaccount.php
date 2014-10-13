<?
require("lib/check.php");
if (isset($_GET["username"])&&isset($_GET["password"])) { // check account
	checkaccount($_GET["username"],$_GET["password"]);
} elseif(isset($_GET["username"])) {
	checkname($_GET["username"]);
} elseif(isset($_GET["email"])) {
	checkmail($_GET["email"]);
}

?>