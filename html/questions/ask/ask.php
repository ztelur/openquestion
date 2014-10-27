<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <script type="text/javascript" src="../../../external/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../../../external/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../external/bootstrap/css/bootstrap.min.css">
    <link href="../../../external/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
	<link href="../../../external/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../../../external/font-awesome/css/font-awesome.css" rel="stylesheet">
	<script type="text/javascript" src="../../../external/js/jquery.hotkeys.js"></script>
	<script type="text/javascript" src="../../../js/bootstrap-wysiwyg.js"></script>
    <link rel="stylesheet" type="text/css" href="ask.css">
    <script type="text/javascript" src="../../../external/google-code-prettify/prettify.js"></script>



    <script type="text/javascript" src="askconfig.js"></script>
    <title></title>
</head>
<body>
        <div class="content">
            <?php
                require("../../../lib/php/pagepart/topbar.php");
                require("../../../lib/php/pagepart/header.php");
            ?>

            <div id="maincontent">
            <div id="mainbar" class="container">
                <form id="post-form" action="submit.php" method="post" role="form" >
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" class="form-control" name="title"
                               placeholder="What's you programming question? Be specific" tabindex="210">
                    </div>
                    <div class="form-group">
                        <?php
                            require("../../../lib/php/pagepart/editor.php");
                        ?>
                    </div>
                    <div class="">
                        <label for="tagname">tag</label>
                        <input id="tagname" type="text" name="tagname" tabindex="212">
                    </div>
                    <div id="tag-suggestions"></div>
                    <div id="question-only-section">
                        <div class="form-group" class="form-submit-cbt">
                            <input id="submit-button" type="submit" value="Post Your Question" tabindex="1" class="form-control"
                                                                   tabindex="213"     >
                            <a href="#">discard</a>
                        </div>
                    </div>
                </form>
            </div>
            <div id="sidebar">
                <div id="scroller">
                    <div id="how-to-title">
                        <h4>How to Ask</h4>
                        <p>Is your question about programming?</p>
                        <p>We prefer questions that can be answered, not just discussed.</p>
                    </div>
                </div>
            </div>
            <div>
            </div>
</body>
</html>