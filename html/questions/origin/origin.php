<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
        <script type="text/javascript" src="../../external/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../../external/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../external/bootstrap/css/bootstrap.min.css">
    <link href="../../external/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
	<link href="../../external/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../../external/font-awesome/css/font-awesome.css" rel="stylesheet">
	<script type="text/javascript" src="../../external/js/jquery.hotkeys.js"></script>
	<script type="text/javascript" src="../../js/bootstrap-wysiwyg.js"></script>
    <script type="text/javascript" src="/external/google-code-prettify/prettify.js"></script>

    <link rel="stylesheet" href="origin/origin.css">
    <script type="text/javascript" src="origin/origin.js"></script>
    <title></title>
</head>
    <div>
        <?php
                require("../../../lib/php/pagepart/topbar.php");
                require("../../../lib/php/pagepart/header.php");
        ?>


                <div class="content">
                    <div id="question-header">
                        <h1 itemprop="name">
                            <a href="" class="question-hyperlink"></a>
                        </h1>
                    </div>
                    <div id="mainbar">
                        <div class="question" data-questionid="" id="question">

                            <table>
                                <tbody>
                                    <tr >
                                        <td class="votecell">

                                                        <a class="vote-up-off" title="this question is useful and clear"><i class="icon-thumbs-up-alt"></i></a>

                                                    <span itemprop="upvotecount" class="vote-count-post">0</span>

                                                        <a class="vote-down-off"  title="it's unclear and not useful">
                                                            <i class="icon-thumbs-down-alt"></i>
                                                        </a>

                                        </td>
                                        <td class="postcell">
                                            <div>
                                                <div class="post-text" itemprop="text"></div>
                                                <div class="post-taglist"></div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                        <div id="answers">
                            <div id="answers-header">
                                <div class="subheader answers-subheader">
                                    <h2></h2>
                                    <div>
                                        <div id="tabs"></div>
                                    </div>
                                </div>
                            </div>

                            <?
//                                                         处理答案的php代码，从数据库中读出答案，写到此文件中去
                            require("../addAnswers.php");
                            if (isset($_GET["dataid"])) {
                                handleAnswers($_GET["dataid"]);
                            }
                            ?>
                        </div>
                    </div>
                    <div id="sidebar">
                        <div id="feed-link">
                            <div id="fedd-link-text">
                                <a href="" title="feed of this question and its answers">
                                    <i class="fa fa-rss"></i>
                                    question feed
                                </a>
                            </div>
                        </div>
                        <div class="module question-stats">
                            <table id="qinfo">
                                <tbody>
                                    <tr>
                                        <td><p class="label-key">asked</p></td>
                                        <td><p class="label-key" title="2014-05-23 19:05:172">
                                            <b> 4 month ago</b>
                                        </p></td>
                                    </tr>
                                    <tr>
                                        <td><p class="label-key">viewed</p></td>
                                        <td><p class="label-key"><b>320 times</b></p></td>
                                    </tr>
                                    <tr>
                                        <td><p class="label-key">active</p></td>
                                        <td><p class="label-key">
                                            <b><a href="?lastactivity" class="lastactivity-link" title="2014-10-22">today</a></b>
                                        </p></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="module community-bulletin"></div>
                        <div class="module sidebar-linked">
                            <h4 id="h-linked">Linked</h4>
                            <div class="linked" >
                                <div class="spacer">
                                    <a href="" title="Vote Score"><div class="answer-votes default">0</div></a>
                                    <a href="" class="question-hyperlink">Reader in swift</a>
                                </div>
                            </div>
                        </div>
                        <div id="hot-network-questions" class="module">
                            <h4>
                                <a href="//8888/question?tab=hot" class="">Hot Network Questions</a>
                                <ul>
                                    <li>
                                        <div class="" title=""></div>
                                        <a href="">center of mass frame for massless particles</a>
                                    </li>
                                </ul>
                            </h4>
                        </div>
                    </div>
                </div>
    </div>
<body>

</body>
</html>