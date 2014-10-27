<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<title>exhelper</title>
        <script src="external/js/jquery-1.11.1.min.js"></script>
        <script src="external/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="external/bootstrap/css/bootstrap.min.css">


        <script type="text/javascript" src="html/user/indexconfig.js"></script>
        <script type="text/javascript" src="js/header.js"></script>
        <script type="text/javascript"src="js/ButtonListener.js"></script>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/origin.css">
        <link rel="stylesheet" type="text/css" href="css/qlistitem.css">



        <meta name="viewport" content="width=device-width,initial-scale=1">
	</head>
	<body>
		<script type="text/javascript">
			window.addEventListener('load',addCheckListener,false);
		</script>
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
                            <div id="question-summary-00000001">

                                <div  class="flag">
                                    <ul class="list-group" >
                                        <li class="list-group-item" class="votes"><span class="badge">0</span>votes </li>
                                        <li class="list-group-item" class="answers"><span class="badge">0</span> answers</li>

                                        </ul>
                                    </div>
                                <div class="panel panel-default" class="qcontent">
                                <div class="summary" class="panel-heading">
                                    <a class="panel-title">how cant java call the python function</a>
                                </div>
                                <div class="panel-body"class="bottomline">
                                    <div class="tags">
                                       <a class="label label-primary">python</a>
                                         <a class="label label-primary">java</a>
                                    </div>
                                <div class="started">
                                    <a>asked 0s ago</a>
                                    <a>ztelur</a>
                                    <span>1</span>
                                </div>
                                </div>

                            </div>
                        </div>
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