
<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-10-27
 * Time: 下午4:15
 */
	session_start();
    $tempusername;
    $temppassword;
    $isCheckLogin=false;
	//check username and password defense coding
if (isset($_POST["username"])&&isset($_POST["password"])) {
    $tempusername=$_POST["username"];
    $temppassword=$_POST["password"];
    $isCheckLogin=true;
}
if (isset($_POST["username_r"])&&isset($_POST["password1"])) {
     $tempusername=$_POST["username_r"];
    $temppassword=$_POST["password1"];
    $isCheckLogin=true;
}

    // connect to the database
if ($isCheckLogin) {
    if (($connection = mysql_connect('localhost', 'pma', '082203')) === FALSE)
        die("Could connect to the database");
    if (mysql_select_db("test", $connection) === FALSE)
        die("Could select the database");
    //produce the sql language
    $sql = sprintf("SELECT * FROM user WHERE username='%s' AND password='%s'",
        mysql_escape_string($tempusername), mysql_escape_string($temppassword));
    $result = mysql_query($sql);
    // print($sql);
    if ($result === FALSE)
        die("could not query database");
    if (mysql_num_rows($result) == 1) {
        $row=mysql_fetch_array($result,MYSQL_ASSOC);
        $_SESSION['user_id']=$row["uid"];
        $_SESSION['user_name']=$row["username"];
        $_SESSION["authenticated"] = TRUE;
    } else {
        $_SESSION["authenticated"] = FALSE;
    }
}
if (isset($_GET["logout"])) {
    unset($_SESSION["user_id"]);
    unset($_SESSION["user_name"]);
//    unset($_SESSION["authenticated"]);
    $_SESSION["authenticated"]=false;
}

?>
    <div class="topbar">
        <nav class="navbar navbar-default navbar-inverse" role="navigation">
            <div class="container-fuild">
                <div class="network-items">
                    <a class="navbar-brand" >
                        Open Question
                    </a>
                </div>
                <div class="topbar-links">
                    <div class="links-container">
                        <div class="collapse navbar-collapse">
                            <form class="navbar-form navbar-right searchform" role="search" action="html/search/search.php" method="post" id="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="search" name="search" id="searchinput"/>
                                </div>
                            </form>
                            <ul class="nav navbar-nav navbar-right">
                               <? if (isset($_SESSION['authenticated'])&&($_SESSION['authenticated']==true)) {
                               ?>
                                    <li><a id="user" href="../../html/user/user.php" class="profile-me" uid="<? echo $_SESSION['user_id']?>">
                                            <div title="ztelur">
                                                <?php
                                                    echo   $_SESSION['user_name'];
                                                ?>
                                            </div>
                                            </a>
                                   </li>
                                    <li class="dropdown ">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">operation<span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-left" role="menu">
                                        <li><a href="#" id="dropdown-profile">Profile</a></li>
                                        <li><a href="#" id="dropdown-askquestion">ask question</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li><a id='dropdown-logout'href="#">Log out</a></li>

                                    </ul>
                                        </li>
                                   </ul>
                                    <?php
                                    } else {
                                        ?>
                                <li><a id="register-link" class="register-link" href="">sign up</a></li>
                                <li><a id="login-link" class="login-link">log in</a></li>
                                <li><a id="tour" class="tour" href="">tour</a></li>
                                    <?php
                                    }
                                    ?>

                            </ul>


                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>