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
    <script type="text/javascript" src="../../external/google-code-prettify/prettify.js"></script>

    <link rel="stylesheet" href="origin/question.css">
    <link rel="stylesheet" href="../../css/origin.css">
    <script type="text/javascript" src="origin/origin.js"></script>
    <script type="text/javascript" src="origin/ButtonListener.js"></script>
</head>
    <div>
        <?php
                require("../../lib/php/pagepart/topbar.php");
                require("../../lib/php/pagepart/header.php");
                require("origin/addExtraInformation.php");

        ?>
                <div class="content">
                    <div id="question-header">
                        <h1 itemprop="name">
                            <a href="" class="question-hyperlink"></a>
                        </h1>
                    </div>
                    <div id="mainbar">
                        <div class="question" data-questionid="" id="question" qid="<?echo $GLOBALS["qid"] ?>">

                            <table>
                                <tbody>
                                    <tr >
                                        <td class="votecell" id="">

                                                        <a class="vote-up-off" title="this question is useful and clear"><i class="icon-thumbs-up-alt"></i></a>

                                                    <span itemprop="upvotecount" class="vote-count-post">
                                                        <?
                                                            echo $GLOBALS["upvote"];
                                                        ?>
                                                    </span>

                                                        <a class="vote-down-off"  title="it's unclear and not useful">
                                                            <i class="icon-thumbs-down-alt"></i>
                                                        </a>

                                        </td>
                                        <td class="postcell">
                                            <div>
                                                <div class="post-text" itemprop="text"></div>
                                                <div class="post-taglist">

                                                </div>
                                                <table class="fw">
                                                    <tbody>
                                                        <tr>
                                                            <td class="vt">
                                                                <div class="post-menu"><span class="score">

                                                                </span>score</div>
                                                            </td>
                                                            <td class="post-signature owner">
                                                                <div class="user-info">
                                                                    <div class="user-action-time">asked <span title="" class="relativetime">234</span></div>
                                                                    <div class="user-gravatar32">
                                                                        <img src="">
                                                                    </div>
                                                                    <div class="user-detail">
                                                                        <a href="" class='username'></a>
                                                                        <br>
                                                                        <span class="reputation-score" title="reputation score">
                                                                            <?php
                                                                                echo $GLOBALS["userscore"];
                                                                            ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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

                                    </div>
                                </div>
                            </div>
                            <?php

                                            require("origin/addAnswers.php");
                                            if (isset($_GET["qid"])) {
                                            handleAnswers($_GET["qid"],$GLOBALS["active"]);
                                            }
                                     ?>
                            <?php
                            if ($GLOBALS["isanswered"]==1) {
                                ?>
                                <form id="post-form" action="origin/answersubmit.php" method="post" class="post-form">
                                    <input type="hidden" id="post-id" value="<?
                                    echo $_SESSION["user_id"];

                                    ?>">
                                    <input type="hidden" id="post-name" value="<?
                                    echo $_SESSION["user_name"];
                                    ?>">
                                    <input type="hidden" id="question-id" value="<?
                                    echo htmlspecialchars($GLOBALS['qid']);
                                    ?>">

                                    <h2>Your Answer</h2>

                                    <div id="post-editor">
                                        <?
                                        require_once("../../lib/php/pagepart/editor.php");
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="button" value="Post Your Answer" tabindex=""
                                               class="postanswerbutton">
                                    </div>
                                </form>
                            <?php
                            } else if ($isanswered==2){
                                ?>
                                    <h4>You have answered this answer</h4>
                                <?php
                                    }else if ($isanswered==3) {
                                echo "<h4>this is your question</h4>";
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
                                                <b><?php
                                                        echo $GLOBALS["time"];
                                                    ?>
                                                </b>
                                        </p></td>
                                    </tr>
                                    <tr>
                                        <td><p class="label-key">answered</p></td>
                                        <td><p class="label-key"><b><?php echo $GLOBALS["answernum"] ?> times</b></p></td>
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