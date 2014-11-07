<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<title>exhelper</title>
        <meta http-equiv="content-type" content="text/html" charset="utf-8">
        <script src="external/js/jquery-1.11.1.min.js"></script>
        <script src="external/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="external/bootstrap/css/bootstrap.min.css">




        <script type="text/javascript"src="js/ButtonListener.js"></script>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/origin.css">
        <link rel="stylesheet" type="text/css" href="css/qlistitem.css">



        <meta name="viewport" content="width=device-width,initial-scale=1">
	</head>
	<body>

        <?
            require("lib/php/pagepart/topbar.php");
        ?>
		<div class="mainwraper">

		<div class="container">
              <?
                        require("lib/php/pagepart/header.php");
               ?>

            <div class="jumbotron">
                <h1>Open Question</h1>
                <p>
                    ask freely,and think freely
                </p>
            </div>

            <div id="content" class="container">
                <div id="mainbar" class="container">
                    <div id="subheader" class="container">
                        <h1 id="h-top-question"> Top Questions</h1>
                        <div id="tabs" class="container">
                            <ul class="pagination">
                            <li><a>interesting</a></li>
                            <li><a>hot</a></li>
                            <li><a>week</a></li>
                            <li><a>month</a></li>
                                </ul>
                        </div>
                    </div>
                    <div id="qlist-wrapper">
                        <div id="question-mini-list">
                            <!--a question layout-->
                            <?php
                                    require_once("addquestionlist.php");
                            ?>
                    </div>
                </div>
                <!--slid bar-->
                <div id="sidebar">
                    <div>
                        <h4><a>Hot Questions</a></h4>
                        <ul>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>

                </div>
            </div>





		</div>
		</div>
		<div id="footer"></div>
        </div>
            </div>
	</body>
</html>