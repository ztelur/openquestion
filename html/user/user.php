<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <script src="../../external/js/jquery-1.11.1.min.js"></script>
    <script src="../../external/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../external/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/origin.css">
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <?
        require("../../lib/php/pagepart/topbar.php");
    ?>
    <div class="container">
        <?php
            require("../../lib/php/pagepart/header.php");
        ?>
        <div id="content" class="snippet-hidden">
            <div id="mainbar-full" class="user-show-new">
                <div class="subheader">
                    <h1 id="user-displayname"><a href="">ztelur</a></h1>
                    <div class="sub-header-links">
                        <a href="">edit</a>
                        <a></a>
                    </div>
                </div>
                <div class="user-info-container" style="height: 60px">
                    <div id="small-user-info" class="user-header">
                        <div class="data">
                            <table>
                                <tbody>
                                    <tr>
                                        <td rowspan="2" class="gravator-cell">
                                            <div class="gravator">
                                                <a href="">
                                                    <div><img src="" alt width="42" height="42" class="logo"></div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="reputation">
                                                <span class="reputation-score">6</span>
                                                "repulation"
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>seen</td>
                                        <td class="supernova" title=""><span title="" class="relativetime"></span></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="user-tabs-nav">
                    <div id="tabs">
                        <a class="youarehere" href="" title="your overall summary">summary</a>
                        <a title="answers you provided">answers</a>
                    </div>
                </div>
                <div>
                    <div id="user-panel-questions" class="user-panel-left">
                        <div class="subheader">
                            <h1><a><span class="count">2</span>Questions</a></h1>
                        </div>
                        <div class="user-panel-content">

                                <?php
                                    require_once("addquestion.php");
                                ?>
                        </div>
                        <div class="user-panel-footer"></div>
                    </div>
                    <div id="user-panel-reputation" class="user-panel">
                        <div class="subheader">
                            <h1><a href=""><span class="count">6</span>"Reputation"</a></h1>
                        </div>
                        <div class="user-panel-content"></div>
                        <div class="user-panel-footer"></div>
                    </div>
                    <div id="user-panel-answers" class="user-panel-left">
                        <div class="subheader">
                            <h1><a><span class="count">0</span> Answers</a></h1>
                        </div>
                        <div class="user-panel-content">
                            <?php
                                require_once("addanswer.php");
                            ?>
                        </div>
                        <div class="user-panel-footer"></div>
                    </div>
                    <div id="user-panel-tags" class="user-panel">
                        <div class="subheader">
                            <h1><a><span class="count">3</span> Tags</a></h1>
                        </div>
                        <div class="user-panel-content">
<!--                            if have tags-->
                            <table class="user-tags">
                                <tbody>
                                <?php
                                    require_once("addtags.php");
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="user-panel-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>