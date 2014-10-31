<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-10-27
 * Time: 下午4:33
 */
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
        <script src="../../external/js/jquery-1.11.1.min.js"></script>
        <script src="../../external/bootstrap/js/bootstrap.min.js"></script>
       <script src="indexconfig.js"></script>

        <link rel="stylesheet" href="../../external/bootstrap/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="../../css/origin.css">
        <link rel="stylesheet" type="text/css" href="login.css">

</head>
<body>
        <script>
            $(document).ready(function () {
                	var username=document.getElementById('username');
	                username.addEventListener('blur',checkUsername,false);
                	var button=document.getElementById("submitbutton");
	                button.addEventListener('click',checkaccount,false);
//                    addCheckListener();
            });
        </script>
        <?
            require("../../lib/php/pagepart/topbar.php");
        ?>
		<div class="mainwraper">

		    <div class="container">
                <?
                require("../../lib/php/pagepart/header.php");
                ?>
            </div>
            <div id="content">
                <div id="mainbar-full" class="login-page">
                    <div class="subheader">
                        <div id="tabs" style="float: left">
                            <?php
                                if ((!isset($_GET["flag"]))||($_GET["flag"]=='login')) {
                            ?>
                            <a href="?flag=login" title="log in to openquestion" class="youarehere">Log in</a>
                            <a href="?flag=signup" title="Sign up to openquestion" class="">Sign up</a>
                        </div>
                    </div>
                    <div>
                        <h2 class="title">Log in </h2>

                        <form action="../../index.php" method="post" name="log" id="logform" role="form">
                            <div class="form-group">
                                <label for="username">username</label>
                                <input type="text" id="username" name="username" placeholder="usename"
                                       class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input require type="password" id="password" name="password" placeholder="password"
                                       class="form-control"/>

                            </div>
                            <div id="button">
                                <div id="twobuttonline" class="form-group">
                                    <input type="button" value="Submit" id="submitbutton" class="btn btn-default"/>
                                </div>
                                <div class="formfooter">
                                    <label class="remember"> <input type="checkbox" name="rememberme" value="y"/>remember
                                        me</label>
                                    <label class="fogetpassword"><a href="resetpassword.html">foget password</a></label>
                                </div>
                            </div>
                        </form>
                        <?php
                        } else {
                        ?>
                        <a href="?flag=login" title="log in to openquestion" class="">Log in</a>
                        <a href="?flag=signup" title="Sign up to openquestion" class="youarehere">Sign up</a>
                    </div>
                </div>
                <div>
                    <h2 class="title">Log in </h2>

                    <form action="../../lib/checkaccount.php" method="post" name="log" id="logform" role="form">
                        <div class="form-group">
                            <label for="username">username</label>
                            <input type="text" id="username_r" name="username_r" placeholder="usename"
                                   class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email"  class="form-control" placeholder="E-mail address">
                        </div>
                        <div class="form-group">
                            <label for="password1">password</label>
                            <input require type="password" id="password1" name="password1" placeholder="password"
                                   class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="password2">password again</label>
                            <input type="password" id="password2" name="password2" class="form-control" placeholder="password again">
                        </div>
                        <div id="button">
                            <div id="twobuttonline" class="form-group">
                                <input type="button" value="Submit" id="submitbutton_r" class="btn btn-default"/>
                            </div>
                            <div class="formfooter">
                                <label class="remember"> <input type="checkbox" name="rememberme" value="y"/>remember
                                    me</label>
                                <label class="fogetpassword"><a href="resetpassword.html">foget password</a></label>
                            </div>
                        </div>
                    </form>
                    <?php
                    }
                        ?>
                    </div>
                </div>
            </div>
        </div>


</body>
</html>