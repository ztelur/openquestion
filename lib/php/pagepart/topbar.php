
<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-10-27
 * Time: 下午4:15
 */
	session_start();

	//check username and password defense coding
if (isset($_POST["username"])&&isset($_POST["password"])) {
    // connect to the database
    if (($connection = mysql_connect('localhost', 'pma', '082203')) === FALSE)
        die("Could connect to the database");
    if (mysql_select_db("test", $connection) === FALSE)
        die("Could select the database");
    //produce the sql language
    $sql = sprintf("SELECT * FROM user WHERE username='%s' AND password='%s'",
        mysql_escape_string($_POST["username"]), mysql_escape_string($_POST["password"]));
    $result = mysql_query($sql);
    // print($sql);
    if ($result === FALSE)
        die("could not query database");
    if (mysql_num_rows($result) == 1) {
        $_SESSION["authenticated"] = TRUE;
    } else {
        $_SESSION["authenticated"] = FALSE;
    }
}
?>
    <div class="topbar">
        <nav class="navbar navbar-default navbar-inverse" role="navigation">
            <div class="container-fuild">
                <div class="network-items">
                    <a class="navbar-brand">
                        Open Question
                    </a>
                </div>
                <div class="topbar-links">
                    <div class="links-container">
                        <div class="collapse navbar-collapse">
                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="search" name="search"/>
                                </div>
                            </form>
                            <ul class="nav navbar-nav navbar-right">
                               <? if (isset($_SESSION['authenticated'])&&($_SESSION['authenticated']==true)) {
                               ?>
                                    <li><a id="user" href="/user/333/ztelur" class="profile-me">
                                            <div title="ztelur">
                                                <img src="">
                                            </div>
                                            ztelur
                                    </a></li>
                                    <?php
                                    } else {
                                        ?>
                                <li><a id="register-link" class="register-link" href="">sign up</a></li>
                                <li><a id="login-link" class="login-link" href="">log in</a></li>
                                <li><a id="tour" class="tour" href="">tour</a><li>
                                    <?php
                                    }
                                    ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">help center <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">ask question</a></li>
                                        <li><a href="#">answer question</a></li>
                                        <li><a href="#">sign up question</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">something else</a></li>

                                    </ul>
                                </li>
                            </ul>


                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>