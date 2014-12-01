<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 14-11-6
 * Time: 上午11:27
 */
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
            <meta http-equiv="content-type" content="text/html" charset="utf-8">
        <script src="../../external/js/jquery-1.11.1.min.js"></script>
        <script src="../../external/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../external/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="search.css">
        <link rel="stylesheet" type="text/css" href="../../css/origin.css">
        <link rel="stylesheet" type="text/css" href="../../css/qlistitem.css">
    <title></title>
</head>
<body>
            <?
            require("../../lib/php/pagepart/topbar.php");
        ?>
            <div id="content">
                <?
                                     require("../../lib/php/pagepart/header.php");
                ?>
        		<div class="mainwraper">


                                <div class="subheader search-header">
                                    <h1>Search</h1>
                                </div>
                                <form id="bigsearch" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="col1">
                                                    <input name="search" class="textbox" type="text" maxlength="140" value="" >
                                                </td>
                                                <td class="col2">
                                                    <input type="submit" value="search">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <div class="result-subheader">
                                    <h2 class="question-num">
                                        <span class="result-label">results</span>
                                    </h2>
                                </div>
                                <div id="qlist-wrapper">
                                    <div id="question-mini-list">
                                    <!--a question layout-->
                                        <?php
                                            require_once("searchquestion.php");
                                        ?>
                                    </div>

                                </div>

                                </div>


            <div id="sidebar">
                <div class="search-model">
                    <p class="side-desc">Results found containing</p>
                    <p><span class="result-highlight">i want to</span></p>
                </div>
                <div id="hot-network-qeustions" class="module">
                    <h4><a href="index.php?tabs=hot" class="js-gps-track">Hot Network Questions</a></h4>
                    <ul>
                        <li><a href="" class="js-gps-track">
                    How to tell sender they forgot the attachment without embarrassing them?
                        </a></li>
                        <li><a href="" class="js-gps-track">What the first Solar Eclipse that demonsta predicated in advance</a></li>
                    </ul>
                </div>
            </div>
            </div>
</body>
</html>